import 'dart:convert';
import 'package:figma_squircle/figma_squircle.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_pet_shop/customView/CountryCodePicker.dart';
import 'package:flutter_pet_shop/utils/Constant.dart';
import 'package:flutter_pet_shop/utils/CustomWidget.dart';
import 'package:flutter_pet_shop/utils/SizeConfig.dart';
import 'PhoneVerification.dart';
import 'SignInPage.dart';
import 'package:http/http.dart' as http;

class SignUpPage extends StatefulWidget {
  @override
  _SignUpPage createState() {
    return _SignUpPage();
  }
}

class _SignUpPage extends State<SignUpPage> {
  TextEditingController textEmailController = TextEditingController();
  TextEditingController textNameController = TextEditingController();
  TextEditingController textPasswordController = TextEditingController();
  bool isTermsCondition = false;

  // Hàm đăng ký người dùng
  Future<void> _signUp() async {
    const String url = 'http://127.0.0.1:8000/api/signup';

    try {
      final response = await http.post(
        Uri.parse(url),
        headers: {'Content-Type': 'application/json'}, // Dữ liệu gửi dạng JSON
        body: jsonEncode({
          'name': textNameController.text.trim(),
          'email': textEmailController.text.trim(),
          'password': textPasswordController.text.trim(),
        }),
      );

      if (response.statusCode == 201) {
        final jsonResponse = jsonDecode(response.body);
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text(jsonResponse['message'])),
        );

        // Chuyển đến màn hình xác minh số điện thoại
        Navigator.pushReplacement(
          context,
          MaterialPageRoute(builder: (context) => PhoneVerification(true)),
        );
      } else {
        final errorResponse = jsonDecode(response.body);
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(
              content: Text(errorResponse['message'] ?? 'Đăng ký thất bại')),
        );
      }
    } catch (e) {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Lỗi kết nối: $e')),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    SizeConfig().init(context);

    double height = getScreenPercentSize(context, 7);
    double radius = getPercentSize(height, 20);

    return WillPopScope(
      onWillPop: () async => false,
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
            onTap: () {
              Navigator.of(context).pop();
            },
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
                    SizedBox(height: getScreenPercentSize(context, 3)),
                    getTextWithFontFamilyWidget(
                      "Sign Up",
                      textColor,
                      getScreenPercentSize(context, 3),
                      FontWeight.w400,
                      TextAlign.left,
                    ),
                    SizedBox(height: getScreenPercentSize(context, 1)),
                    getTextWidget(
                      "Create Account for meet new friends!",
                      textColor,
                      getScreenPercentSize(context, 1.9),
                      FontWeight.w400,
                      TextAlign.left,
                    ),
                    SizedBox(height: getScreenPercentSize(context, 2.5)),
                    getDefaultTextFiledWidget(
                      context,
                      "Full Name",
                      Icons.account_circle_outlined,
                      textNameController,
                    ),
                    getDefaultTextFiledWidget(
                      context,
                      "Email Address",
                      Icons.mail_outline,
                      textEmailController,
                    ),
                    getPasswordTextFiled(
                      context,
                      "Password",
                      textPasswordController,
                    ),
                    SizedBox(height: getScreenPercentSize(context, 1.5)),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.start,
                      children: [
                        InkWell(
                          onTap: () {
                            setState(() {
                              isTermsCondition = !isTermsCondition;
                            });
                          },
                          child: Container(
                            height: getScreenPercentSize(context, 3),
                            width: getScreenPercentSize(context, 3),
                            decoration: BoxDecoration(
                              border: Border.all(
                                color: primaryColor.withOpacity(0.4),
                                width: 1,
                              ),
                              color: isTermsCondition
                                  ? primaryColor
                                  : Colors.transparent,
                              borderRadius: BorderRadius.all(
                                Radius.circular(
                                    getScreenPercentSize(context, 0.5)),
                              ),
                            ),
                            child: Center(
                              child: Icon(
                                Icons.check,
                                size: getScreenPercentSize(context, 2.5),
                                color: isTermsCondition
                                    ? Colors.white
                                    : Colors.transparent,
                              ),
                            ),
                          ),
                        ),
                        SizedBox(width: 5),
                        getTextWidget(
                          'I agree with ',
                          textColor,
                          getScreenPercentSize(context, 1.8),
                          FontWeight.w600,
                          TextAlign.center,
                        ),
                        InkWell(
                          child: getTextWidget(
                            "Terms & Conditions",
                            primaryColor,
                            getScreenPercentSize(context, 1.8),
                            FontWeight.w600,
                            TextAlign.center,
                          ),
                          onTap: () {
                            // Điều hướng đến điều khoản
                          },
                        ),
                      ],
                    ),
                    SizedBox(height: getScreenPercentSize(context, 3)),
                    getButtonWithoutSpaceWidget(
                      context,
                      "Sign Up",
                      primaryColor,
                      () {
                        if (isTermsCondition) {
                          _signUp();
                        } else {
                          ScaffoldMessenger.of(context).showSnackBar(
                            SnackBar(
                              content: Text(
                                  "Please agree to the terms and conditions"),
                            ),
                          );
                        }
                      },
                    ),
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
                        "Already have an account?",
                        textColor,
                        getScreenPercentSize(context, 2),
                        FontWeight.w400,
                        TextAlign.center,
                      ),
                      SizedBox(width: 5),
                      InkWell(
                        child: getTextWidget(
                          "Sign In",
                          primaryColor,
                          getScreenPercentSize(context, 2),
                          FontWeight.w700,
                          TextAlign.center,
                        ),
                        onTap: () {
                          Navigator.push(
                            context,
                            MaterialPageRoute(
                                builder: (context) => SignInPage()),
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
