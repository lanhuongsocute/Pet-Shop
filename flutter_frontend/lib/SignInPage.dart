import 'dart:convert';
import 'package:figma_squircle/figma_squircle.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:http/http.dart' as http;

import 'package:flutter_pet_shop/MainPage.dart';
import 'package:flutter_pet_shop/utils/Constant.dart';
import 'package:flutter_pet_shop/utils/CustomWidget.dart';
import 'package:flutter_pet_shop/utils/PrefData.dart';

import 'ForgotPasswordPage.dart';
import 'SignUpPage.dart';

class SignInPage extends StatefulWidget {
  @override
  _SignInPage createState() {
    return _SignInPage();
  }
}

class _SignInPage extends State<SignInPage> {
  bool isRemember = false;

  TextEditingController textEmailController = TextEditingController();
  TextEditingController textPasswordController = TextEditingController();

  Future<void> _login() async {
    const String url = 'http://127.0.0.1:8000/api/login'; // API URL Laravel

    try {
      final response = await http.post(
        Uri.parse(url),
        headers: {'Content-Type': 'application/json'},
        body: jsonEncode({
          'email': textEmailController.text.trim(),
          'password': textPasswordController.text.trim(),
        }),
      );

      if (response.statusCode == 200) {
        final jsonResponse = jsonDecode(response.body);

        if (jsonResponse['status'] == 'success') {
          ScaffoldMessenger.of(context).showSnackBar(
            SnackBar(content: Text('Login successful!')),
          );

          // Lưu trạng thái đăng nhập (nếu cần)
          PrefData.setIsSignIn(true);

          // Chuyển hướng đến trang chính
          Navigator.pushReplacement(
            context,
            MaterialPageRoute(builder: (context) => MainPage()),
          );
        } else {
          ScaffoldMessenger.of(context).showSnackBar(
            SnackBar(content: Text(jsonResponse['message'] ?? 'Login failed')),
          );
        }
      } else {
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text('Error: ${response.reasonPhrase}')),
        );
      }
    } catch (e) {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Connection error: $e')),
      );
    }
  }

  Future<bool> _requestPop() {
    Navigator.of(context).pop();
    return Future.value(false);
  }

  @override
  Widget build(BuildContext context) {
    return WillPopScope(
      onWillPop: _requestPop,
      child: Scaffold(
        backgroundColor: backgroundColor,
        appBar: AppBar(
          backgroundColor: backgroundColor,
          elevation: 0,
          systemOverlayStyle: SystemUiOverlayStyle(
            statusBarColor: backgroundColor,
            statusBarIconBrightness: Brightness.dark,
            statusBarBrightness: Brightness.light,
          ),
          title: Text(""),
          leading: GestureDetector(
            onTap: _requestPop,
            child: Icon(
              Icons.keyboard_backspace,
              color: textColor,
            ),
          ),
        ),
        body: Container(
          padding:
              EdgeInsets.symmetric(horizontal: getHorizontalSpace(context)),
          child: Column(
            children: [
              Expanded(
                child: ListView(
                  children: [
                    SizedBox(height: getScreenPercentSize(context, 2)),
                    Align(
                      alignment: Alignment.topLeft,
                      child: Image.asset(
                        assetsPath + "splash_icon.png",
                        height: getScreenPercentSize(context, 7.5),
                        color: primaryColor,
                      ),
                    ),
                    SizedBox(height: getScreenPercentSize(context, 1.5)),
                    getTextWithFontFamilyWidget(
                      "Hey,\nLogin Now",
                      textColor,
                      getScreenPercentSize(context, 3),
                      FontWeight.w400,
                      TextAlign.left,
                    ),
                    SizedBox(height: getScreenPercentSize(context, 1.5)),
                    getTextWidget(
                      "Glad to meet you again!",
                      textColor,
                      getScreenPercentSize(context, 1.8),
                      FontWeight.w500,
                      TextAlign.left,
                    ),
                    SizedBox(height: getScreenPercentSize(context, 2.5)),
                    getDefaultTextFiledWidget(
                      context,
                      "Email Address",
                      Icons.account_circle_outlined,
                      textEmailController,
                    ),
                    getPasswordTextFiled(
                      context,
                      "Password",
                      textPasswordController,
                    ),
                    SizedBox(height: getScreenPercentSize(context, 1.5)),
                    InkWell(
                      child: getTextWidget(
                        "Forgot Password?",
                        primaryColor,
                        getScreenPercentSize(context, 1.8),
                        FontWeight.w600,
                        TextAlign.end,
                      ),
                      onTap: () {
                        Navigator.push(
                          context,
                          MaterialPageRoute(
                              builder: (context) => ForgotPasswordPage()),
                        );
                      },
                    ),
                    SizedBox(height: getScreenPercentSize(context, 4)),
                    getButtonWithoutSpaceWidget(
                        context, "Login", primaryColor, _login),
                  ],
                ),
              ),
              Align(
                alignment: Alignment.bottomCenter,
                child: Container(
                  margin:
                      EdgeInsets.only(bottom: getScreenPercentSize(context, 2)),
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      getTextWidget(
                        "Don't have an account?",
                        textColor,
                        getScreenPercentSize(context, 2),
                        FontWeight.w400,
                        TextAlign.center,
                      ),
                      SizedBox(width: 5),
                      InkWell(
                        child: getTextWidget(
                          "Sign Up",
                          primaryColor,
                          getScreenPercentSize(context, 2),
                          FontWeight.w500,
                          TextAlign.center,
                        ),
                        onTap: () {
                          Navigator.push(
                            context,
                            MaterialPageRoute(
                                builder: (context) => SignUpPage()),
                          );
                        },
                      ),
                    ],
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
