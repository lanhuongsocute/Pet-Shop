import 'dart:convert';
import 'package:http/http.dart' as http;

class ApiService {
  final String baseUrl = 'http://localhost/flutter_api/api.php'; // Địa chỉ API

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
