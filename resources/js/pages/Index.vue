<template>
    <div class="wrapper">
        <NavbarComponent/>
        <SidebarComponent/>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <ContentHeaderComponent/>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <router-view/>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.login-box-body -->
        <div class="overlay" :class="{show: isShow}">
            <img src="images/loading.gif" alt="loading">
        </div>
        <FooterComponent/>
    </div>
</template>

<script>
    import NavbarComponent from '../layouts/Navbar.vue'
    import SidebarComponent from '../layouts/Sidebar.vue'
    import ContentHeaderComponent from '../layouts/ContentHeader.vue'
    import FooterComponent from '../layouts/Footer.vue'

    export default {
        name: "Index",
        components: {
            NavbarComponent,
            SidebarComponent,
            ContentHeaderComponent,
            FooterComponent
        },
        created() {
            document.body.className = document.body.className.replace("login-page", "")
        },
        data() {
            return {
                isShow: false,
            }
        },
    }
</script>
