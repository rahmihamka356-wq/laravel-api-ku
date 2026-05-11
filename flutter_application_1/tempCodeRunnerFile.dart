void main() {
  runApp(MaterialApp(
    home: Scaffold(
      appBar: AppBar(
        title: Text('Contoh Kolom'),
      ),
      body: Column(
        children: [
          Text('Item 1'),
          Text('Item 2'),
          Text('Item 3'),
        ],
      ),
    ),
  ));
}