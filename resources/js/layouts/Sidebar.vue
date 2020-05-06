<template>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">lutkan</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img id="userImage" src="" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <UserMenu />
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>

<script>
    import UserMenu from '../layouts/UserMenu'
    export default {
        name: "Sidebar",
        components: {
            UserMenu
        }
    }
</script>
