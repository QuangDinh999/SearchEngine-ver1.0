<!DOCTYPE html>
<html>
<head>
  <title>Student Record Management</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}">

  <!-- plugin css -->
  <link rel="stylesheet" href="{{asset('assets/plugins/@mdi/font/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}">
  <!-- end plugin css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


{{--    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">--}}
  <!-- common css -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- end common css -->


</head>
<body data-base-url="{{url('/')}}">

  <div class="container-scroller" id="app">
{{--    @include('layout.header')--}}
    <div class="container-fluid page-body-wrapper">
      @include('layout.sidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
    </div>
  </div>




  <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="{{asset('js/index1.js')}}"></script>

  <script>
      function SearchImage() {
          closeForm2()
          const chatContainer = document.querySelector('.chat-container');
          const gridContainer = document.querySelector('.grid-container');
          var imgPath = document.getElementById('image').value;
          var search_word = document.getElementById('message').value;

          var imgName = imgPath.split('\\').pop();
          console.log(imgName, search_word)
          const userMessage = document.createElement('div');
          userMessage.classList.add('chat-bubble', 'user-chat');
          userMessage.innerHTML = `<span class="message">${search_word}</span>
                                    <img src="" alt="">`;

          // Hiển thị tin nhắn của người dùng trong khung chat
          chatContainer.appendChild(userMessage);

          // Ẩn grid-container
          gridContainer.classList.add('hidden');



          $.ajax({
              url: "http://localhost/SearchEngine/public/api/image_search",
              type: "GET",
              data: imgName,
              success: function (response){
                  var answer = response.map(function(current, index) {
                      return `<p style="width=550px">${current.description}</p>`
                  })
                  console.log(response.description, response)
                  const result = document.createElement('div');
                  result.classList.add('chat-bubble', 'system-chat');
                  result.classList.add('profile-info');

                  const description = document.createElement('div');
                  description.classList.add('chat-bubble', 'system-chat');
                  description.classList.add('profile-info');

                  description.innerHTML = answer.join('');


                  result.appendChild(description);

                  // Hiển thị hồ sơ của cá nhân một cách từ từ

                  // Thêm hồ sơ cá nhân vào khung chat
                  chatContainer.appendChild(result);
              },
              error: function (xhr) {
                  console.error(xhr.responseText);
              }
          })
      }
      function displayDemoMedia(event) {
          const file = event.target.files[0];
          console.log(file)
          const fileType = file.type.split('/')[0]; // Lấy loại file

          if (fileType === 'image') {
              const img = document.getElementById('demo-image');
              const video = document.getElementById('demo-video');
              img.style.display = 'block';
              video.style.display = 'none';
              img.src = URL.createObjectURL(file);
          } else if (fileType === 'video') {
              const img = document.getElementById('demo-image');
              const video = document.getElementById('demo-video');
              img.style.display = 'none';
              video.style.display = 'block';
              video.src = URL.createObjectURL(file);
          }
      }
  </script>
</body>
</html>
