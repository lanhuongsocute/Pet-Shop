import 'dart:async';
import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_localizations/flutter_localizations.dart';
import 'package:flutter_pet_shop/utils/Constant.dart';
import 'package:flutter_pet_shop/utils/CustomWidget.dart';
import 'package:flutter_pet_shop/utils/MyTheme.dart';
import 'package:flutter_pet_shop/utils/PrefData.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:http/http.dart' as http;

import 'IntroPage.dart';
import 'MainPage.dart';
import 'SignInPage.dart';
import 'generated/l10n.dart';

MyTheme myTheme = MyTheme();

class ApiService {
  final String baseUrl =
      'http://localhost/flutter_api/api.php'; // Địa chỉ API của bạn

  // Hàm thêm item
  Future<void> addItem(String name) async {
    final response = await http.post(
      Uri.parse(baseUrl),
      body: {'name': name},
    );

    if (response.statusCode == 200) {
      print('Item added: ${response.body}');
    } else {
      print('Failed to add item: ${response.statusCode}');
    }
  }

  // Hàm lấy danh sách item
  Future<List<dynamic>> getItems() async {
    final response = await http.get(Uri.parse(baseUrl));

    if (response.statusCode == 200) {
      return json.decode(response.body);
    } else {
      throw Exception('Failed to load items: ${response.statusCode}');
    }
  }
}

void main() {
  WidgetsFlutterBinding.ensureInitialized();

  SystemChrome.setPreferredOrientations(
      [DeviceOrientation.portraitUp, DeviceOrientation.portraitDown]);

  SharedPreferences.getInstance().then((instance) async {
    setThemePosition();
    runApp(MyApp());
  });
}

class MyApp extends StatefulWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  _MyApp createState() => _MyApp();
}

class _MyApp extends State<MyApp> {
  @override
  void initState() {
    super.initState();
    myTheme.switchTheme();
    setState(() {});
    myTheme.addListener(() {
      setState(() {});
    });
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      localizationsDelegates: [
        GlobalMaterialLocalizations.delegate,
        GlobalWidgetsLocalizations.delegate,
        S.delegate,
      ],
      debugShowCheckedModeBanner: false,
      supportedLocales: [
        const Locale('en', 'US'), // English US
        const Locale('en', 'GB'), // English UK
      ],
      title: 'Flutter Demo',
      theme: ThemeData(
          colorScheme:
              ColorScheme.fromSwatch().copyWith(secondary: primaryColor),
          primaryColor: primaryColor,
          dialogBackgroundColor: lightCellColor,
          brightness: Brightness.light,
          splashColor: Colors.transparent,
          primaryColorLight: Colors.white),
      themeMode: myTheme.currentTheme(),
      darkTheme: ThemeData(
        splashFactory: NoSplash.splashFactory,
        primaryColor: primaryColor,
        brightness: Brightness.dark,
        splashColor: Colors.transparent,
        dialogBackgroundColor: darkCellColor,
        primaryColorDark: darkBackgroundColor,
      ),
      home: SplashScreen(),
    );
  }
}

class SplashScreen extends StatefulWidget {
  @override
  _SplashScreen createState() => _SplashScreen();
}

class _SplashScreen extends State<SplashScreen> {
  bool _isSignIn = false;
  bool _isIntro = false;
  final ApiService apiService = ApiService();

  @override
  void initState() {
    super.initState();
    signInValue();

    // Gọi hàm getItems() khi khởi tạo SplashScreen
    fetchItems();

    Timer(Duration(seconds: 3), () {
      if (_isIntro) {
        Navigator.pushReplacement(
            context, MaterialPageRoute(builder: (context) => IntroPage()));
      } else if (!_isSignIn) {
        Navigator.pushReplacement(
            context,
            MaterialPageRoute(
              builder: (context) => SignInPage(),
            ));
      } else {
        Navigator.pushReplacement(
            context,
            MaterialPageRoute(
              builder: (context) => MainPage(),
            ));
      }
    });
  }

  void fetchItems() async {
    try {
      List<dynamic> items = await apiService.getItems();
      print(items); // In danh sách item ra console
    } catch (e) {
      print('Error fetching items: $e');
    }
  }

  void signInValue() async {
    _isIntro = await PrefData.getIsIntro();
    _isSignIn = await PrefData.getIsSignIn();
    setState(() {});
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: primaryColor,
      appBar: AppBar(
        backgroundColor: primaryColor,
        elevation: 0,
        toolbarHeight: 0,
      ),
      body: Container(
        height: double.infinity,
        width: double.infinity,
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            Image.asset(
              assetsPath + "splash_icon.png",
              height: getScreenPercentSize(context, 12),
              color: Colors.white,
            ),
            SizedBox(
              height: getScreenPercentSize(context, 1.2),
            ),
            Center(
              child: getSplashTextWidget(
                  "Petshops",
                  Colors.white,
                  getScreenPercentSize(context, 4),
                  FontWeight.w500,
                  TextAlign.center),
            ),
          ],
        ),
      ),
    );
  }
}
