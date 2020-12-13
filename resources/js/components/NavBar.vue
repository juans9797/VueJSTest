<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="info">
            <b-button v-b-toggle.sidebar-1 class="mr-2">Menu</b-button>
            <b-navbar-brand href="#">VueJS Test</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav class="ml-auto">
                    <b-nav-item-dropdown right class="mr-3">
                        <template #button-content>
                            <em>User</em>
                        </template>
                        <b-dropdown-item href="#">
                            <b-avatar class="mr-3"></b-avatar>
                            <span class="mr-auto">Juan</span>
                        </b-dropdown-item>
                        <b-dropdown-item href="#">Sign Out</b-dropdown-item>
                    </b-nav-item-dropdown>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>

