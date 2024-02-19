@extends('layout.master')
@section('content')
    <div class="content">
        <div class="grid-container">
            <a href="{{route('history.destroy')}}">Delete session</a>
            <h1 class="title">Hello, I'm your assistant. I'm here to help you solve problems.</h1><br>
            <!-- Ô vuông 1 -->
            <div class="grid-item">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">Give me a photo of a person. I can tell you
                    his/her all bio informations I have.</span>
            </div>
            <!-- Ô vuông 2 -->
            <div class="grid-item">
                <i class="menu-icon mdi mdi-file-music-outline"></i>
                <span class="menu-title">Give me a file of
                    voice/melody/song/sound. I can tell you
                    something I realize from them.</span>
            </div>
            <!-- Ô vuông 3 -->
            <div class="grid-item">
                <i class="menu-icon mdi mdi-image-frame"></i>
                <span class="menu-title">Give me a file of video/picture/draw, etc. I
                    can tell you something I realize from them</span>
            </div>
            <!-- Ô vuông 4 -->
            <div class="grid-item">
                <i class="menu-icon mdi mdi-car"></i>
                <span class="menu-title">Give me a number plate of car/motorbike,
                    etc. I can tell you something such as: last
                    location found, kind of vehicle, owner, etc.</span>
            </div>
            <!-- Ô vuông 5 -->
            <div class="grid-item">
                <i class="menu-icon mdi mdi-message-reply-text"></i>
                <span class="menu-title">Give me any request to find someone,
                    somewhere, something, etc</span>
            </div>
        </div>
        <div class="chat-container">
            <!-- Tin nhắn sẽ được hiển thị ở đây -->
        </div>
    </div>

    <div class="container-fluid clearfix">
        <form class="search-form" action="#" method="GET">
            <div class="input-group rounded-pill">
                <input id="search_word" type="text" class="form-control rounded-pill" placeholder="Try your first search here...">
                <div class="input-group-append">

                    <button  class="btn btn-primary square-rounded" type="button">
                        <i class="mdi mdi-arrow-up"></i>
                    </button>
                </div>
            </div>
        </form>
        <button class="btn btn-secondary square-rounded" type="button">
            <i class="mdi mdi-attachment"></i>
        </button>
    </div>
    <style>
        .content {
            display: flex;
            justify-content: center; /* Căn giữa theo chiều ngang */
            align-items: center; /* Căn giữa theo chiều dọc */
            height: 80vh; /* Đảm bảo rằng nội dung nằm giữa màn hình */
        }

        .grid-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; /* Các ô vuông sẽ được căn đều trên mỗi hàng */
            max-width: 800px; /* Điều chỉnh kích thước của lưới */
        }

        .grid-item {
            flex: 0 0 calc(35% - 19px); /* Chia lưới thành 3 cột và điều chỉnh khoảng cách giữa chúng */
            background-color: #d3d3d3;
            margin-bottom: 20px; /* Điều chỉnh khoảng cách dưới cùng của mỗi ô vuông */
            border-radius: 5px;
            padding: 20px;
            text-align: center;
        }

        .menu-icon {
            font-size: 36px;
        }

        .menu-title {
            display: block;
            margin-top: 10px;
        }
        .title {
            font-family: 'Roboto', sans-serif;
            font-size: 28px;
            text-align: center;
            margin-top: 30px; /* Khoảng cách từ tiêu đề đến lưới */
        }
        .chat-container {
            width: 80%;
            max-width: 1600px; /* Điều chỉnh kích thước của container chat */
            max-height: calc(80vh - 100px); /* 80% chiều cao của viewport trừ đi chiều cao của thanh search */
            display: flex;
            flex-direction: column;
            overflow-y: auto; /* Hiển thị thanh cuộn ngang khi nội dung vượt quá */
            flex-grow: 1; /* Cho phép chat-container mở rộng để điều chỉnh kích thước trong flexbox layout */
        }


        .chat-bubble {
            background-color: #d3d3d3;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .system-chat {
            align-self: flex-start; /* Đặt hệ thống chat ở bên trái */
        }

        .user-chat {
            align-self: flex-end; /* Đặt người dùng chat ở bên phải */
        }

        .search-bar {
            margin-top: 20px;
        }

        .search-bar input[type="text"] {
            padding: 10px;
            width: 70%;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        .search-bar button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .avatar {
            width: 30px; /* Độ rộng của avatar */
            height: 30px; /* Độ cao của avatar */
            border-radius: 50%; /* Hình dạng hình tròn */
            margin-right: 10px; /* Khoảng cách giữa avatar và nội dung tin nhắn */
        }

        .user-chat .avatar {
            float: right; /* Avatar người dùng nằm bên phải */
        }

        .system-chat .avatar {
            float: left; /* Avatar hệ thống nằm bên trái */
        }

    </style>
    <style>
        .footer {
            padding: 20px 0;
        }

        .search-form {
            display: flex;
            justify-content: center;
        }

        .input-group {
            width: 100%; /* Sử dụng toàn bộ chiều rộng của container */
        }

        .input-group input {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .input-group-append {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .btn-secondary {
            background-color: #ffffff;
            border-color:  #ffffff;
        }

        .btn-primary {
            background-color: #6c6e72;
            border-color: #6c6e72;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .square-rounded {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .hidden {
            display: none;
        }
        .profile {
            width: 400px;
            margin: auto;
        }

        .profile-picture {
            width: 100px;
            height: 100px;
            background-color: #f1f1f1;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .profile-info p {
            margin-bottom: 10px;
        }

    </style>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>

    // thêm onclick="SubmitSearch()" ở button hàm lấy dữ liệu về chưa render
    {{--function SubmitSearch() {--}}
    {{--    var search_word = document.getElementById('search_word').value;--}}
    {{--    console.log(search_word)--}}
    {{--    $.ajax({--}}
    {{--        url: "{{ route('person.search') }}",--}}
    {{--        type: "GET",--}}
    {{--        data: { data: search_word },--}}
    {{--        success: function(response) {--}}
    {{--            // Xử lý phản hồi từ máy chủ--}}
    {{--            console.log(response);--}}
    {{--        },--}}
    {{--        error: function(xhr) {--}}
    {{--            // Xử lý lỗi nếu có--}}
    {{--            console.error(xhr.responseText);--}}
    {{--        }--}}
    {{--    })--}}
    {{--}--}}
    document.addEventListener('DOMContentLoaded', function () {
        const searchForm = document.querySelector('.search-form');
        const chatContainer = document.querySelector('.chat-container');
        const gridContainer = document.querySelector('.grid-container');

        searchForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const searchInput = searchForm.querySelector('input[type="text"]');
            const searchTerm = searchInput.value;

            // Tạo tin nhắn của người dùng
            const userMessage = document.createElement('div');
            userMessage.classList.add('chat-bubble', 'user-chat');
            userMessage.innerHTML = `
            <span class="message">${searchTerm}</span>
        `;

            // Hiển thị tin nhắn của người dùng trong khung chat
            chatContainer.appendChild(userMessage);

            // Ẩn grid-container
            gridContainer.classList.add('hidden');
            // Xóa nội dung trong ô tìm kiếm sau khi đã xử lý
            searchInput.value = '';
        });
        $('#search_word').keypress(function(event) {
            if (event.keyCode === 13) {

                var search_word = document.getElementById('search_word').value;
                console.log(search_word);
                $.ajax({
                    url: "http://localhost/SearchEngine/public/api/person",
                    type: "GET",
                    data: { data: search_word },
                    success: function(response) {
                        console.log(response)
                        var person = response.map(function (current, index){
                            return `<div class="profile">
                                               <img class="profile-picture" src="${current.image}">
                                          <div class="profile-info">
                                            <p>Tên: ${current.name}</p>
                                            <p>Giới tính: ${current.gender}</p>
                                            <p>Tuổi: ${current.age}</p>
                                            <p>Số ID/Hộ chiếu: ssss</p>
                                            <p>Số điện thoại: ${current.phone}</p>
                                            <p>Email: ${current.email}</p>
                                            <p>Địa chỉ: ${current.address}</p>
                                            <p>Biography: ${current.Biography}</p>
                                          </div>
                                        </div>`;
                        });

                            $.ajax({
                                url: "{{route('history.search')}}",
                                type: "GET",
                                data: {
                                    search_word: search_word,
                                    history: person
                                },
                                success: function (response) {
                                    var history = response.map(function (current, index){
                                        return ` <li><a data-number="${index}" href="#">${current.search_word}</a></li>`
                                    })
                                    console.log(history.join(''))
                                    document.querySelector('.search-list').innerHTML = history.join('')

                                    var searchItems = document.querySelectorAll('.search-list li a');
                                    searchItems.forEach(function(item) {
                                        item.addEventListener('click', function(event) {
                                            event.preventDefault();
                                            console.log('click event added');
                                            var index = item.getAttribute('data-number');
                                            console.log(response[index].content);

                                            // Tạo tin nhắn của người dùng
                                            const userMessage = document.createElement('div');
                                            userMessage.classList.add('chat-bubble', 'user-chat');
                                            userMessage.innerHTML = `
                                                <span class="message">${response[index].search_word}</span>
                                            `;

                                            // Hiển thị tin nhắn của người dùng trong khung chat
                                            chatContainer.appendChild(userMessage);

                                            // Ẩn grid-container
                                            gridContainer.classList.add('hidden');

                                            const systemMessage = document.createElement('div');
                                            systemMessage.classList.add('chat-bubble', 'system-chat');
                                            systemMessage.innerHTML = `<span class="message">Hệ thống trả lời:</span>${response[index].content.join('')}`;

                                            chatContainer.appendChild(systemMessage);
                                        });
                                    });
                                },
                                error: function (xhr) {
                                    console.error(xhr.responseText);
                                }
                            })
                        const systemMessage = document.createElement('div');
                        systemMessage.classList.add('chat-bubble', 'system-chat');
                        systemMessage.innerHTML = `<span class="message">Hệ thống trả lời:</span>${person.join('')}`;

                        chatContainer.appendChild(systemMessage);
                    },
                    error: function(xhr) {
                        // Xử lý lỗi nếu có
                        console.error(xhr.responseText);
                    }
                });
            }
        });


    });



</script>
