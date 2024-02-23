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
                    his/her all bio information I have.</span>
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
        <button class="btn btn-outline-info" onclick="openForm()" style="margin-top: 12px"> <i class="mdi mdi-account-search"></i>
            Person Searching
        </button>
        <button class="btn btn-inverse-success" onclick="openForm2()" style="margin-top: 12px"> <i class="mdi mdi-camera-iris"></i>
            Upload Photo/Video
        </button>
        <div class="container-fluid clearfix">
            <!-- Container chứa uploadOptions và vùng trống -->
            <div id="uploadOptions" class="upload-options">
                <!-- Các tùy chọn upload -->
                <button class="btn btn-outline-danger" onclick="uploadVideo()">
                    <i class="mdi mdi-camera-iris"></i> Upload Video
                </button>
                <button class="btn btn-outline-success" onclick="uploadImage()">
                    <i class="mdi mdi-picture-in-picture-bottom-right-outline"></i> Upload Image
                </button>
                <button class="btn btn-outline-warning" onclick="uploadAudio()">
                    <i class="mdi mdi-music"></i> Upload Audio
                </button>
            </div>
        </div>

        <div class="form-popup" id="myForm">
            <form action="/action_page.php" class="form-container">
                <h1 style="text-align: center;">Add Input Here</h1>

                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" required>

                <label for="age"><b>Age</b></label>
                <input type="number" placeholder="Enter Age" name="age" required>

                <label for="gender"><b>Gender</b></label><br>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Female</label><br>

                <label for="phone"><b>Phone</b></label>
                <input type="tel" placeholder="Enter Phone Number" name="phone" required>

                <label for="mail"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" required><br>

                <label for="cccd"><b>CCCD</b></label>
                <input type="text" placeholder="Enter CCCD" name="cccd" required>

                <label for="address"><b>Address</b></label>
                <input type="text" placeholder="Enter Address" name="address" required><br>

                <label for="picture" id="picture-label"><b>Picture</b></label><br>
                <input type="file" id="picture" name="picture" accept="image/*" onchange="displaySelectedImage(event)">
                <button type="button" onclick="removePicture()">Remove</button><br>

                <!-- Thẻ img để hiển thị hình ảnh được chọn -->
                <img id="selected-image" src="#" alt="Selected Image" style="display: none; max-width: 300px; max-height: 300px;">

                <button type="submit" class="btn">
                    <i class="mdi mdi-arrow-up"></i>Search Now</button>
                <button type="button" class="close-btn" onclick="closeForm()">
                    <i class="mdi mdi-close" style="color: red;"></i> <!-- Sử dụng icon dấu x màu đỏ -->
                </button>
            </form>


        </div>
        <div class="form-popup" id="myForm2">
            <h1>Upload Photo/Video</h1>
            <!-- Ô nhập message -->
            <label for="message"><b>Message</b></label>
            <input id="message" name="message" placeholder="Enter your message" required><br>

            <!-- Ô chọn file -->
            <label for="file"><b>File</b></label>
            <input id="image" type="file" id="file" name="file"  accept="image/*, video/*" onchange="displayDemoMedia(event)" required>

            <!-- Hiển thị hình ảnh demo -->
            <img id="demo-image" src="#" alt="Demo Image" style="display: none; max-width: 300px; max-height: 300px;">

            <!-- Hiển thị video demo -->
            <video id="demo-video" src="#" controls style="display: none; max-width: 300px;"></video>

            <button onclick="SearchImage()" class="btn"><i class="mdi mdi-arrow-up"></i>Send</button>
            <button type="button" class="close-btn" onclick="closeForm2()"> <i class="mdi mdi-close" style="color: red;"></i></button>
        </div>
        <div class="overlay" id="overlay"></div>
    </div>
    </div>


    <script>
        function SearchImage() {
            var imgName = document.getElementById('image').value;
            var search_word = document.getElementById('message').value;
            console.log(imgName, search_word)
        }
        function displayDemoMedia(event) {
            const file = event.target.files[0];
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
@endsection

