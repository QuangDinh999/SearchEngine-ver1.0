<footer class="footer">
    <div class="container-fluid clearfix">
        <form class="search-form" action="#" method="GET">
            <div class="input-group rounded-pill">
                <input type="text" class="form-control rounded-pill" placeholder="Try your first search here...">
                <div class="input-group-append">
                    <button class="btn btn-secondary square-rounded" type="button">
                        <i class="mdi mdi-attachment"></i>
                    </button>
                    <button class="btn btn-primary square-rounded" type="button">
                        <i class="mdi mdi-arrow-up"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</footer>

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
</style>
