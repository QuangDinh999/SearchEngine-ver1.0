<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
{{--@if(session('lecturer'))--}}

{{--@endif--}}
<nav class="sidebar sidebar-right">
    <!-- Nội dung của sidebar bên phải -->
</nav>

<script>
    function updateClock() {
        const now = new Date();
        const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const dayOfWeek = daysOfWeek[now.getDay()];
        const day = now.getDate().toString().padStart(2, '0');
        const month = (now.getMonth() + 1).toString().padStart(2, '0');
        const year = now.getFullYear();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        const dateString = `${dayOfWeek}, ${day}/${month}/${year}`;
        const timeString = `${hours}:${minutes}:${seconds}`;

        document.getElementById('date').textContent = dateString;
        document.getElementById('time').textContent = timeString;
    }

    // Cập nhật đồng hồ mỗi giây
    setInterval(updateClock, 1000);

    // Khởi động đồng hồ ban đầu
    updateClock();


</script>

<!-- Tùy chỉnh CSS -->
