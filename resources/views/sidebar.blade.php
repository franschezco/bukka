<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="index.html" aria-expanded="false"><i class="mdi mdi-bell-ring"></i><span
                                    class="hide-menu">Orders</span></a></li>
                                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                        href="shopping-cart.html" aria-expanded="false"><i class="mdi mdi-cart-outline"></i><span
                                            class="hide-menu">Cart</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ url('/profile,{$data->id}') }}" aria-expanded="false"><i
                                    class="mdi mdi-account-network"></i><span class="hide-menu">Profile</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="index[].html" aria-expanded="false"><i class="mdi mdi-cash-multiple"></i><span
                                    class="hide-menu">Payment Setting</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="messages.html" aria-expanded="false"><i class="mdi mdi-comment-multiple-outline"></i><span
                                    class="hide-menu">Messaging</span></a></li>



                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/logout') }}"aria-expanded="false"
                 >
                    <i class="mdi mdi-logout-variant"></i><span
                                    class="hide-menu">

                        Log Out</span></a></li>
                </form>

                            </form>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
