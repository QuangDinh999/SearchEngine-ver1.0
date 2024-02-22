function openForm() {
    document.getElementById("myForm").style.display = "block";
    document.getElementById("overlay").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

function openForm2() {
    document.getElementById("myForm2").style.display = "block";
    document.getElementById("overlay").style.display = "block";
}

function closeForm2() {
    document.getElementById("myForm2").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}


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
    $('#search_word').keypress(function (event) {
        if (event.keyCode === 13) {
            var search_word = document.getElementById('search_word').value;
            console.log(search_word);
            if (search_word.includes('video về')) {
                var words = search_word.split(' ')
                console.log(words)
                var keywordFound = false
                var keyword = ""

                for (var i = 0; i < words.length; i++) {
                    if (keywordFound === true) {
                        keyword += words[i] + " "
                        console.log(keyword)
                    }
                    if (words[i] === "về") {
                        keywordFound = true
                    }
                }
                var newKW = keyword.trim()
                var apiKey = 'AIzaSyDX21ICxDf6k8wtYIF74K-hSCNwuxftA5o';
                var apiUrl = 'https://www.googleapis.com/youtube/v3/search?q=' + newKW + '&part=snippet&type=video&maxResults=1&key=' + apiKey;
                $.ajax({
                    url: apiUrl,
                    type: "GET",
                    data: newKW,
                    success: function (response) {
                        // Lấy link video đầu tiên từ kết quả tìm kiếm
                        var videoId = response.items[0].id.videoId;
                        console.log(videoId)
                        var videoLink = 'https://www.youtube.com/embed/' + videoId;

                        // Nhúng video vào trang web của bạn
                        var videoContainer = document.createElement('div');
                        videoContainer.classList.add('video-container');
                        videoContainer.innerHTML = '<iframe src="' + videoLink + '" allowfullscreen></iframe>';

                        const systemMessage = document.createElement('div');
                        systemMessage.classList.add('chat-bubble', 'system-chat');
                        systemMessage.innerHTML = '<span class="message">Hệ thống trả lời:</span>';
                        systemMessage.appendChild(videoContainer);

                        chatContainer.appendChild(systemMessage);
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                    }
                })
            } else {
                $.ajax({
                    url: "http://localhost/SearchEngine/public/api/person",
                    type: "GET",
                    data: {data: search_word},
                    success: function (response) {
                        console.log(response)
                        var person = response.map(function (current, index) {
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
                                var history = response.map(function (current, index) {
                                    return ` <li><a data-number="${index}" href="#">${current.search_word}</a></li>`
                                })
                                console.log(history.join(''))
                                document.querySelector('.search-list').innerHTML = history.join('')

                                var searchItems = document.querySelectorAll('.search-list li a');
                                searchItems.forEach(function (item) {
                                    item.addEventListener('click', function (event) {
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
                    error: function (xhr) {
                        // Xử lý lỗi nếu có
                        console.error(xhr.responseText);
                    }
                })
            }
        }
    });


});



