<?php

/* base_layout.twig */
class __TwigTemplate_2fecc115cd97ab4dad796f0739a2dad3e137173257dba5be45f0dc303de259c0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'css' => array($this, 'block_css'),
            'content_header' => array($this, 'block_content_header'),
            'content' => array($this, 'block_content'),
            'js' => array($this, 'block_js'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo " | Sigma</title>

        ";
        // line 8
        $this->displayBlock('css', $context, $blocks);
        // line 42
        echo "    </head>
    <body class=\"hold-transition skin-blue sidebar-mini\">
        <div class=\"wrapper\">

            <header class=\"main-header\">
                <!-- Logo -->
                <a href=\"index2.html\" class=\"logo\">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class=\"logo-mini\"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class=\"logo-lg\"><b>Admin</b>LTE</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class=\"navbar navbar-static-top\" role=\"navigation\">
                    <!-- Sidebar toggle button-->
                    <a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"offcanvas\" role=\"button\">
                        <span class=\"sr-only\">Toggle navigation</span>
                    </a>

                    <div class=\"navbar-custom-menu\">
                        <ul class=\"nav navbar-nav\">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class=\"dropdown messages-menu\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                    <i class=\"fa fa-envelope-o\"></i>
                                    <span class=\"label label-success\">4</span>
                                </a>
                                <ul class=\"dropdown-menu\">
                                    <li class=\"header\">You have 4 messages</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class=\"menu\">
                                            <li><!-- start message -->
                                                <a href=\"#\">
                                                    <div class=\"pull-left\">
                                                        <img src=\"dist/img/user2-160x160.jpg\" class=\"img-circle\" alt=\"User Image\">
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class=\"fa fa-clock-o\"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                            <li>
                                                <a href=\"#\">
                                                    <div class=\"pull-left\">
                                                        <img src=\"dist/img/user3-128x128.jpg\" class=\"img-circle\" alt=\"User Image\">
                                                    </div>
                                                    <h4>
                                                        AdminLTE Design Team
                                                        <small><i class=\"fa fa-clock-o\"></i> 2 hours</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href=\"#\">
                                                    <div class=\"pull-left\">
                                                        <img src=\"dist/img/user4-128x128.jpg\" class=\"img-circle\" alt=\"User Image\">
                                                    </div>
                                                    <h4>
                                                        Developers
                                                        <small><i class=\"fa fa-clock-o\"></i> Today</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href=\"#\">
                                                    <div class=\"pull-left\">
                                                        <img src=\"dist/img/user3-128x128.jpg\" class=\"img-circle\" alt=\"User Image\">
                                                    </div>
                                                    <h4>
                                                        Sales Department
                                                        <small><i class=\"fa fa-clock-o\"></i> Yesterday</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href=\"#\">
                                                    <div class=\"pull-left\">
                                                        <img src=\"dist/img/user4-128x128.jpg\" class=\"img-circle\" alt=\"User Image\">
                                                    </div>
                                                    <h4>
                                                        Reviewers
                                                        <small><i class=\"fa fa-clock-o\"></i> 2 days</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class=\"footer\"><a href=\"#\">See All Messages</a></li>
                                </ul>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class=\"dropdown notifications-menu\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                    <i class=\"fa fa-bell-o\"></i>
                                    <span class=\"label label-warning\">10</span>
                                </a>
                                <ul class=\"dropdown-menu\">
                                    <li class=\"header\">You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class=\"menu\">
                                            <li>
                                                <a href=\"#\">
                                                    <i class=\"fa fa-users text-aqua\"></i> 5 new members joined today
                                                </a>
                                            </li>
                                            <li>
                                                <a href=\"#\">
                                                    <i class=\"fa fa-warning text-yellow\"></i> Very long description here that may not fit into the
                                                    page and may cause design problems
                                                </a>
                                            </li>
                                            <li>
                                                <a href=\"#\">
                                                    <i class=\"fa fa-users text-red\"></i> 5 new members joined
                                                </a>
                                            </li>
                                            <li>
                                                <a href=\"#\">
                                                    <i class=\"fa fa-shopping-cart text-green\"></i> 25 sales made
                                                </a>
                                            </li>
                                            <li>
                                                <a href=\"#\">
                                                    <i class=\"fa fa-user text-red\"></i> You changed your username
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class=\"footer\"><a href=\"#\">View all</a></li>
                                </ul>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <li class=\"dropdown tasks-menu\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                    <i class=\"fa fa-flag-o\"></i>
                                    <span class=\"label label-danger\">9</span>
                                </a>
                                <ul class=\"dropdown-menu\">
                                    <li class=\"header\">You have 9 tasks</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class=\"menu\">
                                            <li><!-- Task item -->
                                                <a href=\"#\">
                                                    <h3>
                                                        Design some buttons
                                                        <small class=\"pull-right\">20%</small>
                                                    </h3>
                                                    <div class=\"progress xs\">
                                                        <div class=\"progress-bar progress-bar-aqua\" style=\"width: 20%\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                                            <span class=\"sr-only\">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href=\"#\">
                                                    <h3>
                                                        Create a nice theme
                                                        <small class=\"pull-right\">40%</small>
                                                    </h3>
                                                    <div class=\"progress xs\">
                                                        <div class=\"progress-bar progress-bar-green\" style=\"width: 40%\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                                            <span class=\"sr-only\">40% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href=\"#\">
                                                    <h3>
                                                        Some task I need to do
                                                        <small class=\"pull-right\">60%</small>
                                                    </h3>
                                                    <div class=\"progress xs\">
                                                        <div class=\"progress-bar progress-bar-red\" style=\"width: 60%\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                                            <span class=\"sr-only\">60% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                            <li><!-- Task item -->
                                                <a href=\"#\">
                                                    <h3>
                                                        Make beautiful transitions
                                                        <small class=\"pull-right\">80%</small>
                                                    </h3>
                                                    <div class=\"progress xs\">
                                                        <div class=\"progress-bar progress-bar-yellow\" style=\"width: 80%\" role=\"progressbar\" aria-valuenow=\"20\" aria-valuemin=\"0\" aria-valuemax=\"100\">
                                                            <span class=\"sr-only\">80% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                        </ul>
                                    </li>
                                    <li class=\"footer\">
                                        <a href=\"#\">View all tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class=\"dropdown user user-menu\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                    <img src=\"dist/img/user2-160x160.jpg\" class=\"user-image\" alt=\"User Image\">
                                    <span class=\"hidden-xs\">Alexander Pierce</span>
                                </a>
                                <ul class=\"dropdown-menu\">
                                    <!-- User image -->
                                    <li class=\"user-header\">
                                        <img src=\"dist/img/user2-160x160.jpg\" class=\"img-circle\" alt=\"User Image\">

                                        <p>
                                            Alexander Pierce - Web Developer
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class=\"user-body\">
                                        <div class=\"row\">
                                            <div class=\"col-xs-4 text-center\">
                                                <a href=\"#\">Followers</a>
                                            </div>
                                            <div class=\"col-xs-4 text-center\">
                                                <a href=\"#\">Sales</a>
                                            </div>
                                            <div class=\"col-xs-4 text-center\">
                                                <a href=\"#\">Friends</a>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class=\"user-footer\">
                                        <div class=\"pull-left\">
                                            <a href=\"#\" class=\"btn btn-default btn-flat\">Profile</a>
                                        </div>
                                        <div class=\"pull-right\">
                                            <a href=\"";
        // line 293
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "login/logout\" class=\"btn btn-default btn-flat\">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href=\"#\" data-toggle=\"control-sidebar\"><i class=\"fa fa-gears\"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class=\"main-sidebar\">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class=\"sidebar\">
                    <!-- Sidebar user panel -->
                    <div class=\"user-panel\">
                        <div class=\"pull-left image\">
                            <img src=\"dist/img/user2-160x160.jpg\" class=\"img-circle\" alt=\"User Image\">
                        </div>
                        <div class=\"pull-left info\">
                            <p>Alexander Pierce</p>
                            <a href=\"#\"><i class=\"fa fa-circle text-success\"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action=\"#\" method=\"get\" class=\"sidebar-form\">
                        <div class=\"input-group\">
                            <input type=\"text\" name=\"q\" class=\"form-control\" placeholder=\"Search...\">
                            <span class=\"input-group-btn\">
                                <button type=\"submit\" name=\"search\" id=\"search-btn\" class=\"btn btn-flat\"><i class=\"fa fa-search\"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class=\"sidebar-menu\">
                        <li class=\"header\">MAIN NAVIGATION</li>
                        <li class=\"active treeview\">
                            <a href=\"#\">
                                <i class=\"fa fa-dashboard\"></i> <span>Dashboard</span> <i class=\"fa fa-angle-left pull-right\"></i>
                            </a>
                            <ul class=\"treeview-menu\">
                                <li class=\"active\"><a href=\"index.html\"><i class=\"fa fa-circle-o\"></i> Dashboard v1</a></li>
                                <li><a href=\"index2.html\"><i class=\"fa fa-circle-o\"></i> Dashboard v2</a></li>
                            </ul>
                        </li>
                        <li class=\"treeview\">
                            <a href=\"#\">
                                <i class=\"fa fa-files-o\"></i>
                                <span>Layout Options</span>
                                <span class=\"label label-primary pull-right\">4</span>
                            </a>
                            <ul class=\"treeview-menu\">
                                <li><a href=\"pages/layout/top-nav.html\"><i class=\"fa fa-circle-o\"></i> Top Navigation</a></li>
                                <li><a href=\"pages/layout/boxed.html\"><i class=\"fa fa-circle-o\"></i> Boxed</a></li>
                                <li><a href=\"pages/layout/fixed.html\"><i class=\"fa fa-circle-o\"></i> Fixed</a></li>
                                <li><a href=\"pages/layout/collapsed-sidebar.html\"><i class=\"fa fa-circle-o\"></i> Collapsed Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href=\"pages/widgets.html\">
                                <i class=\"fa fa-th\"></i> <span>Widgets</span>
                                <small class=\"label pull-right bg-green\">new</small>
                            </a>
                        </li>
                        <li class=\"treeview\">
                            <a href=\"#\">
                                <i class=\"fa fa-pie-chart\"></i>
                                <span>Charts</span>
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </a>
                            <ul class=\"treeview-menu\">
                                <li><a href=\"pages/charts/chartjs.html\"><i class=\"fa fa-circle-o\"></i> ChartJS</a></li>
                                <li><a href=\"pages/charts/morris.html\"><i class=\"fa fa-circle-o\"></i> Morris</a></li>
                                <li><a href=\"pages/charts/flot.html\"><i class=\"fa fa-circle-o\"></i> Flot</a></li>
                                <li><a href=\"pages/charts/inline.html\"><i class=\"fa fa-circle-o\"></i> Inline charts</a></li>
                            </ul>
                        </li>
                        <li class=\"treeview\">
                            <a href=\"#\">
                                <i class=\"fa fa-laptop\"></i>
                                <span>UI Elements</span>
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </a>
                            <ul class=\"treeview-menu\">
                                <li><a href=\"pages/UI/general.html\"><i class=\"fa fa-circle-o\"></i> General</a></li>
                                <li><a href=\"pages/UI/icons.html\"><i class=\"fa fa-circle-o\"></i> Icons</a></li>
                                <li><a href=\"pages/UI/buttons.html\"><i class=\"fa fa-circle-o\"></i> Buttons</a></li>
                                <li><a href=\"pages/UI/sliders.html\"><i class=\"fa fa-circle-o\"></i> Sliders</a></li>
                                <li><a href=\"pages/UI/timeline.html\"><i class=\"fa fa-circle-o\"></i> Timeline</a></li>
                                <li><a href=\"pages/UI/modals.html\"><i class=\"fa fa-circle-o\"></i> Modals</a></li>
                            </ul>
                        </li>
                        <li class=\"treeview\">
                            <a href=\"#\">
                                <i class=\"fa fa-edit\"></i> <span>Forms</span>
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </a>
                            <ul class=\"treeview-menu\">
                                <li><a href=\"pages/forms/general.html\"><i class=\"fa fa-circle-o\"></i> General Elements</a></li>
                                <li><a href=\"pages/forms/advanced.html\"><i class=\"fa fa-circle-o\"></i> Advanced Elements</a></li>
                                <li><a href=\"pages/forms/editors.html\"><i class=\"fa fa-circle-o\"></i> Editors</a></li>
                            </ul>
                        </li>
                        <li class=\"treeview\">
                            <a href=\"#\">
                                <i class=\"fa fa-table\"></i> <span>Tables</span>
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </a>
                            <ul class=\"treeview-menu\">
                                <li><a href=\"pages/tables/simple.html\"><i class=\"fa fa-circle-o\"></i> Simple tables</a></li>
                                <li><a href=\"pages/tables/data.html\"><i class=\"fa fa-circle-o\"></i> Data tables</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href=\"pages/calendar.html\">
                                <i class=\"fa fa-calendar\"></i> <span>Calendar</span>
                                <small class=\"label pull-right bg-red\">3</small>
                            </a>
                        </li>
                        <li>
                            <a href=\"pages/mailbox/mailbox.html\">
                                <i class=\"fa fa-envelope\"></i> <span>Mailbox</span>
                                <small class=\"label pull-right bg-yellow\">12</small>
                            </a>
                        </li>
                        <li class=\"treeview\">
                            <a href=\"#\">
                                <i class=\"fa fa-folder\"></i> <span>Examples</span>
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </a>
                            <ul class=\"treeview-menu\">
                                <li><a href=\"pages/examples/invoice.html\"><i class=\"fa fa-circle-o\"></i> Invoice</a></li>
                                <li><a href=\"pages/examples/profile.html\"><i class=\"fa fa-circle-o\"></i> Profile</a></li>
                                <li><a href=\"pages/examples/login.html\"><i class=\"fa fa-circle-o\"></i> Login</a></li>
                                <li><a href=\"pages/examples/register.html\"><i class=\"fa fa-circle-o\"></i> Register</a></li>
                                <li><a href=\"pages/examples/lockscreen.html\"><i class=\"fa fa-circle-o\"></i> Lockscreen</a></li>
                                <li><a href=\"pages/examples/404.html\"><i class=\"fa fa-circle-o\"></i> 404 Error</a></li>
                                <li><a href=\"pages/examples/500.html\"><i class=\"fa fa-circle-o\"></i> 500 Error</a></li>
                                <li><a href=\"pages/examples/blank.html\"><i class=\"fa fa-circle-o\"></i> Blank Page</a></li>
                                <li><a href=\"pages/examples/pace.html\"><i class=\"fa fa-circle-o\"></i> Pace Page</a></li>
                            </ul>
                        </li>
                        <li class=\"treeview\">
                            <a href=\"#\">
                                <i class=\"fa fa-share\"></i> <span>Multilevel</span>
                                <i class=\"fa fa-angle-left pull-right\"></i>
                            </a>
                            <ul class=\"treeview-menu\">
                                <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level One</a></li>
                                <li>
                                    <a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level One <i class=\"fa fa-angle-left pull-right\"></i></a>
                                    <ul class=\"treeview-menu\">
                                        <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Two</a></li>
                                        <li>
                                            <a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Two <i class=\"fa fa-angle-left pull-right\"></i></a>
                                            <ul class=\"treeview-menu\">
                                                <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Three</a></li>
                                                <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level Three</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href=\"#\"><i class=\"fa fa-circle-o\"></i> Level One</a></li>
                            </ul>
                        </li>
                        <li><a href=\"documentation/index.html\"><i class=\"fa fa-book\"></i> <span>Documentation</span></a></li>
                        <li class=\"header\">LABELS</li>
                        <li><a href=\"#\"><i class=\"fa fa-circle-o text-red\"></i> <span>Important</span></a></li>
                        <li><a href=\"#\"><i class=\"fa fa-circle-o text-yellow\"></i> <span>Warning</span></a></li>
                        <li><a href=\"#\"><i class=\"fa fa-circle-o text-aqua\"></i> <span>Information</span></a></li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class=\"content-wrapper\">
                <!-- Content Header (Page header) -->
                ";
        // line 476
        $this->displayBlock('content_header', $context, $blocks);
        // line 478
        echo "                
                <!-- Main content -->
                ";
        // line 480
        $this->displayBlock('content', $context, $blocks);
        // line 482
        echo "                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class=\"main-footer\">
                <div class=\"pull-right hidden-xs\">
                    <b>Version</b> 2.3.1
                </div>
                <strong>Copyright &copy; 2014-2015 <a href=\"http://almsaeedstudio.com\">Almsaeed Studio</a>.</strong> All rights
                reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class=\"control-sidebar control-sidebar-dark\">
                <!-- Create the tabs -->
                <ul class=\"nav nav-tabs nav-justified control-sidebar-tabs\">
                    <li><a href=\"#control-sidebar-home-tab\" data-toggle=\"tab\"><i class=\"fa fa-home\"></i></a></li>
                    <li><a href=\"#control-sidebar-settings-tab\" data-toggle=\"tab\"><i class=\"fa fa-gears\"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class=\"tab-content\">
                    <!-- Home tab content -->
                    <div class=\"tab-pane\" id=\"control-sidebar-home-tab\">
                        <h3 class=\"control-sidebar-heading\">Recent Activity</h3>
                        <ul class=\"control-sidebar-menu\">
                            <li>
                                <a href=\"javascript::;\">
                                    <i class=\"menu-icon fa fa-birthday-cake bg-red\"></i>

                                    <div class=\"menu-info\">
                                        <h4 class=\"control-sidebar-subheading\">Langdon's Birthday</h4>

                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href=\"javascript::;\">
                                    <i class=\"menu-icon fa fa-user bg-yellow\"></i>

                                    <div class=\"menu-info\">
                                        <h4 class=\"control-sidebar-subheading\">Frodo Updated His Profile</h4>

                                        <p>New phone +1(800)555-1234</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href=\"javascript::;\">
                                    <i class=\"menu-icon fa fa-envelope-o bg-light-blue\"></i>

                                    <div class=\"menu-info\">
                                        <h4 class=\"control-sidebar-subheading\">Nora Joined Mailing List</h4>

                                        <p>nora@example.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href=\"javascript::;\">
                                    <i class=\"menu-icon fa fa-file-code-o bg-green\"></i>

                                    <div class=\"menu-info\">
                                        <h4 class=\"control-sidebar-subheading\">Cron Job 254 Executed</h4>

                                        <p>Execution time 5 seconds</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                        <h3 class=\"control-sidebar-heading\">Tasks Progress</h3>
                        <ul class=\"control-sidebar-menu\">
                            <li>
                                <a href=\"javascript::;\">
                                    <h4 class=\"control-sidebar-subheading\">
                                        Custom Template Design
                                        <span class=\"label label-danger pull-right\">70%</span>
                                    </h4>

                                    <div class=\"progress progress-xxs\">
                                        <div class=\"progress-bar progress-bar-danger\" style=\"width: 70%\"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href=\"javascript::;\">
                                    <h4 class=\"control-sidebar-subheading\">
                                        Update Resume
                                        <span class=\"label label-success pull-right\">95%</span>
                                    </h4>

                                    <div class=\"progress progress-xxs\">
                                        <div class=\"progress-bar progress-bar-success\" style=\"width: 95%\"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href=\"javascript::;\">
                                    <h4 class=\"control-sidebar-subheading\">
                                        Laravel Integration
                                        <span class=\"label label-warning pull-right\">50%</span>
                                    </h4>

                                    <div class=\"progress progress-xxs\">
                                        <div class=\"progress-bar progress-bar-warning\" style=\"width: 50%\"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href=\"javascript::;\">
                                    <h4 class=\"control-sidebar-subheading\">
                                        Back End Framework
                                        <span class=\"label label-primary pull-right\">68%</span>
                                    </h4>

                                    <div class=\"progress progress-xxs\">
                                        <div class=\"progress-bar progress-bar-primary\" style=\"width: 68%\"></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class=\"tab-pane\" id=\"control-sidebar-stats-tab\">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class=\"tab-pane\" id=\"control-sidebar-settings-tab\">
                        <form method=\"post\">
                            <h3 class=\"control-sidebar-heading\">General Settings</h3>

                            <div class=\"form-group\">
                                <label class=\"control-sidebar-subheading\">
                                    Report panel usage
                                    <input type=\"checkbox\" class=\"pull-right\" checked>
                                </label>

                                <p>
                                    Some information about this general settings option
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class=\"form-group\">
                                <label class=\"control-sidebar-subheading\">
                                    Allow mail redirect
                                    <input type=\"checkbox\" class=\"pull-right\" checked>
                                </label>

                                <p>
                                    Other sets of options are available
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class=\"form-group\">
                                <label class=\"control-sidebar-subheading\">
                                    Expose author name in posts
                                    <input type=\"checkbox\" class=\"pull-right\" checked>
                                </label>

                                <p>
                                    Allow the user to show his name in blog posts
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <h3 class=\"control-sidebar-heading\">Chat Settings</h3>

                            <div class=\"form-group\">
                                <label class=\"control-sidebar-subheading\">
                                    Show me as online
                                    <input type=\"checkbox\" class=\"pull-right\" checked>
                                </label>
                            </div>
                            <!-- /.form-group -->

                            <div class=\"form-group\">
                                <label class=\"control-sidebar-subheading\">
                                    Turn off notifications
                                    <input type=\"checkbox\" class=\"pull-right\">
                                </label>
                            </div>
                            <!-- /.form-group -->

                            <div class=\"form-group\">
                                <label class=\"control-sidebar-subheading\">
                                    Delete chat history
                                    <a href=\"javascript::;\" class=\"text-red pull-right\"><i class=\"fa fa-trash-o\"></i></a>
                                </label>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class=\"control-sidebar-bg\"></div>
        </div>
        <!-- ./wrapper -->
        ";
        // line 688
        $this->displayBlock('js', $context, $blocks);
        // line 727
        echo "    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
    }

    // line 8
    public function block_css($context, array $blocks = array())
    {
        // line 9
        echo "            <!-- Tell the browser to be responsive to screen width -->
            <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
            <!-- Bootstrap 3.3.5 -->
            <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/bootstrap/css/bootstrap.min.css\">
            <!-- Font Awesome -->
            <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css\">
            <!-- Ionicons -->
            <link rel=\"stylesheet\" href=\"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css\">
            <!-- Theme style -->
            <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/dist/css/AdminLTE.min.css\">
            <!-- AdminLTE Skins. Choose a skin from the css/skins
                 folder instead of downloading all of them to reduce the load. -->
            <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/dist/css/skins/_all-skins.min.css\">
            <!-- iCheck -->
            <link rel=\"stylesheet\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/iCheck/flat/blue.css\">
            <!-- Morris chart -->
            <link rel=\"stylesheet\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/morris/morris.css\">
            <!-- jvectormap -->
            <link rel=\"stylesheet\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/jvectormap/jquery-jvectormap-1.2.2.css\">
            <!-- Date Picker -->
            <link rel=\"stylesheet\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/datepicker/datepicker3.css\">
            <!-- Daterange picker -->
            <link rel=\"stylesheet\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/daterangepicker/daterangepicker-bs3.css\">
            <!-- bootstrap wysihtml5 - text editor -->
            <link rel=\"stylesheet\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css\">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
            <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
            <![endif]-->
        ";
    }

    // line 476
    public function block_content_header($context, array $blocks = array())
    {
        // line 477
        echo "                ";
    }

    // line 480
    public function block_content($context, array $blocks = array())
    {
        // line 481
        echo "                ";
    }

    // line 688
    public function block_js($context, array $blocks = array())
    {
        // line 689
        echo "            <!-- jQuery 2.1.4 -->
            <script src=\"";
        // line 690
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/jQuery/jQuery-2.1.4.min.js\"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src=\"https://code.jquery.com/ui/1.11.4/jquery-ui.min.js\"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                \$.widget.bridge('uibutton', \$.ui.button);
            </script>
            <!-- Bootstrap 3.3.5 -->
            <script src=\"";
        // line 698
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/bootstrap/js/bootstrap.min.js\"></script>
            <!-- Morris.js charts -->
            <script src=\"https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js\"></script>
            <script src=\"";
        // line 701
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/morris/morris.min.js\"></script>
            <!-- Sparkline -->
            <script src=\"";
        // line 703
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/sparkline/jquery.sparkline.min.js\"></script>
            <!-- jvectormap -->
            <script src=\"";
        // line 705
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js\"></script>
            <script src=\"";
        // line 706
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js\"></script>
            <!-- jQuery Knob Chart -->
            <script src=\"";
        // line 708
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/knob/jquery.knob.js\"></script>
            <!-- daterangepicker -->
            <script src=\"https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js\"></script>
            <script src=\"";
        // line 711
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/daterangepicker/daterangepicker.js\"></script>
            <!-- datepicker -->
            <script src=\"";
        // line 713
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/datepicker/bootstrap-datepicker.js\"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src=\"";
        // line 715
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js\"></script>
            <!-- Slimscroll -->
            <script src=\"";
        // line 717
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/slimScroll/jquery.slimscroll.min.js\"></script>
            <!-- FastClick -->
            <script src=\"";
        // line 719
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/fastclick/fastclick.js\"></script>
            <!-- AdminLTE App -->
            <script src=\"";
        // line 721
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/dist/js/app.min.js\"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src=\"";
        // line 723
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/dist/js/pages/dashboard.js\"></script>
            <!-- AdminLTE for demo purposes -->
            <script src=\"";
        // line 725
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/dist/js/demo.js\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "base_layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  869 => 725,  864 => 723,  859 => 721,  854 => 719,  849 => 717,  844 => 715,  839 => 713,  834 => 711,  828 => 708,  823 => 706,  819 => 705,  814 => 703,  809 => 701,  803 => 698,  792 => 690,  789 => 689,  786 => 688,  782 => 481,  779 => 480,  775 => 477,  772 => 476,  759 => 33,  754 => 31,  749 => 29,  744 => 27,  739 => 25,  734 => 23,  729 => 21,  723 => 18,  714 => 12,  709 => 9,  706 => 8,  701 => 6,  695 => 727,  693 => 688,  485 => 482,  483 => 480,  479 => 478,  477 => 476,  291 => 293,  38 => 42,  36 => 8,  31 => 6,  24 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="utf-8">*/
/*         <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*         <title>{% block title %}{% endblock %} | Sigma</title>*/
/* */
/*         {% block css %}*/
/*             <!-- Tell the browser to be responsive to screen width -->*/
/*             <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">*/
/*             <!-- Bootstrap 3.3.5 -->*/
/*             <link rel="stylesheet" href="{{base_url}}public/bootstrap/css/bootstrap.min.css">*/
/*             <!-- Font Awesome -->*/
/*             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">*/
/*             <!-- Ionicons -->*/
/*             <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">*/
/*             <!-- Theme style -->*/
/*             <link rel="stylesheet" href="{{base_url}}public/dist/css/AdminLTE.min.css">*/
/*             <!-- AdminLTE Skins. Choose a skin from the css/skins*/
/*                  folder instead of downloading all of them to reduce the load. -->*/
/*             <link rel="stylesheet" href="{{base_url}}public/dist/css/skins/_all-skins.min.css">*/
/*             <!-- iCheck -->*/
/*             <link rel="stylesheet" href="{{base_url}}public/plugins/iCheck/flat/blue.css">*/
/*             <!-- Morris chart -->*/
/*             <link rel="stylesheet" href="{{base_url}}public/plugins/morris/morris.css">*/
/*             <!-- jvectormap -->*/
/*             <link rel="stylesheet" href="{{base_url}}public/plugins/jvectormap/jquery-jvectormap-1.2.2.css">*/
/*             <!-- Date Picker -->*/
/*             <link rel="stylesheet" href="{{base_url}}public/plugins/datepicker/datepicker3.css">*/
/*             <!-- Daterange picker -->*/
/*             <link rel="stylesheet" href="{{base_url}}public/plugins/daterangepicker/daterangepicker-bs3.css">*/
/*             <!-- bootstrap wysihtml5 - text editor -->*/
/*             <link rel="stylesheet" href="{{base_url}}plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">*/
/* */
/*             <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/*             <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*             <!--[if lt IE 9]>*/
/*             <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>*/
/*             <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>*/
/*             <![endif]-->*/
/*         {% endblock %}*/
/*     </head>*/
/*     <body class="hold-transition skin-blue sidebar-mini">*/
/*         <div class="wrapper">*/
/* */
/*             <header class="main-header">*/
/*                 <!-- Logo -->*/
/*                 <a href="index2.html" class="logo">*/
/*                     <!-- mini logo for sidebar mini 50x50 pixels -->*/
/*                     <span class="logo-mini"><b>A</b>LT</span>*/
/*                     <!-- logo for regular state and mobile devices -->*/
/*                     <span class="logo-lg"><b>Admin</b>LTE</span>*/
/*                 </a>*/
/*                 <!-- Header Navbar: style can be found in header.less -->*/
/*                 <nav class="navbar navbar-static-top" role="navigation">*/
/*                     <!-- Sidebar toggle button-->*/
/*                     <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">*/
/*                         <span class="sr-only">Toggle navigation</span>*/
/*                     </a>*/
/* */
/*                     <div class="navbar-custom-menu">*/
/*                         <ul class="nav navbar-nav">*/
/*                             <!-- Messages: style can be found in dropdown.less-->*/
/*                             <li class="dropdown messages-menu">*/
/*                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">*/
/*                                     <i class="fa fa-envelope-o"></i>*/
/*                                     <span class="label label-success">4</span>*/
/*                                 </a>*/
/*                                 <ul class="dropdown-menu">*/
/*                                     <li class="header">You have 4 messages</li>*/
/*                                     <li>*/
/*                                         <!-- inner menu: contains the actual data -->*/
/*                                         <ul class="menu">*/
/*                                             <li><!-- start message -->*/
/*                                                 <a href="#">*/
/*                                                     <div class="pull-left">*/
/*                                                         <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">*/
/*                                                     </div>*/
/*                                                     <h4>*/
/*                                                         Support Team*/
/*                                                         <small><i class="fa fa-clock-o"></i> 5 mins</small>*/
/*                                                     </h4>*/
/*                                                     <p>Why not buy a new awesome theme?</p>*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                             <!-- end message -->*/
/*                                             <li>*/
/*                                                 <a href="#">*/
/*                                                     <div class="pull-left">*/
/*                                                         <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">*/
/*                                                     </div>*/
/*                                                     <h4>*/
/*                                                         AdminLTE Design Team*/
/*                                                         <small><i class="fa fa-clock-o"></i> 2 hours</small>*/
/*                                                     </h4>*/
/*                                                     <p>Why not buy a new awesome theme?</p>*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                             <li>*/
/*                                                 <a href="#">*/
/*                                                     <div class="pull-left">*/
/*                                                         <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">*/
/*                                                     </div>*/
/*                                                     <h4>*/
/*                                                         Developers*/
/*                                                         <small><i class="fa fa-clock-o"></i> Today</small>*/
/*                                                     </h4>*/
/*                                                     <p>Why not buy a new awesome theme?</p>*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                             <li>*/
/*                                                 <a href="#">*/
/*                                                     <div class="pull-left">*/
/*                                                         <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">*/
/*                                                     </div>*/
/*                                                     <h4>*/
/*                                                         Sales Department*/
/*                                                         <small><i class="fa fa-clock-o"></i> Yesterday</small>*/
/*                                                     </h4>*/
/*                                                     <p>Why not buy a new awesome theme?</p>*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                             <li>*/
/*                                                 <a href="#">*/
/*                                                     <div class="pull-left">*/
/*                                                         <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">*/
/*                                                     </div>*/
/*                                                     <h4>*/
/*                                                         Reviewers*/
/*                                                         <small><i class="fa fa-clock-o"></i> 2 days</small>*/
/*                                                     </h4>*/
/*                                                     <p>Why not buy a new awesome theme?</p>*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                         </ul>*/
/*                                     </li>*/
/*                                     <li class="footer"><a href="#">See All Messages</a></li>*/
/*                                 </ul>*/
/*                             </li>*/
/*                             <!-- Notifications: style can be found in dropdown.less -->*/
/*                             <li class="dropdown notifications-menu">*/
/*                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">*/
/*                                     <i class="fa fa-bell-o"></i>*/
/*                                     <span class="label label-warning">10</span>*/
/*                                 </a>*/
/*                                 <ul class="dropdown-menu">*/
/*                                     <li class="header">You have 10 notifications</li>*/
/*                                     <li>*/
/*                                         <!-- inner menu: contains the actual data -->*/
/*                                         <ul class="menu">*/
/*                                             <li>*/
/*                                                 <a href="#">*/
/*                                                     <i class="fa fa-users text-aqua"></i> 5 new members joined today*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                             <li>*/
/*                                                 <a href="#">*/
/*                                                     <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the*/
/*                                                     page and may cause design problems*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                             <li>*/
/*                                                 <a href="#">*/
/*                                                     <i class="fa fa-users text-red"></i> 5 new members joined*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                             <li>*/
/*                                                 <a href="#">*/
/*                                                     <i class="fa fa-shopping-cart text-green"></i> 25 sales made*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                             <li>*/
/*                                                 <a href="#">*/
/*                                                     <i class="fa fa-user text-red"></i> You changed your username*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                         </ul>*/
/*                                     </li>*/
/*                                     <li class="footer"><a href="#">View all</a></li>*/
/*                                 </ul>*/
/*                             </li>*/
/*                             <!-- Tasks: style can be found in dropdown.less -->*/
/*                             <li class="dropdown tasks-menu">*/
/*                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">*/
/*                                     <i class="fa fa-flag-o"></i>*/
/*                                     <span class="label label-danger">9</span>*/
/*                                 </a>*/
/*                                 <ul class="dropdown-menu">*/
/*                                     <li class="header">You have 9 tasks</li>*/
/*                                     <li>*/
/*                                         <!-- inner menu: contains the actual data -->*/
/*                                         <ul class="menu">*/
/*                                             <li><!-- Task item -->*/
/*                                                 <a href="#">*/
/*                                                     <h3>*/
/*                                                         Design some buttons*/
/*                                                         <small class="pull-right">20%</small>*/
/*                                                     </h3>*/
/*                                                     <div class="progress xs">*/
/*                                                         <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">*/
/*                                                             <span class="sr-only">20% Complete</span>*/
/*                                                         </div>*/
/*                                                     </div>*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                             <!-- end task item -->*/
/*                                             <li><!-- Task item -->*/
/*                                                 <a href="#">*/
/*                                                     <h3>*/
/*                                                         Create a nice theme*/
/*                                                         <small class="pull-right">40%</small>*/
/*                                                     </h3>*/
/*                                                     <div class="progress xs">*/
/*                                                         <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">*/
/*                                                             <span class="sr-only">40% Complete</span>*/
/*                                                         </div>*/
/*                                                     </div>*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                             <!-- end task item -->*/
/*                                             <li><!-- Task item -->*/
/*                                                 <a href="#">*/
/*                                                     <h3>*/
/*                                                         Some task I need to do*/
/*                                                         <small class="pull-right">60%</small>*/
/*                                                     </h3>*/
/*                                                     <div class="progress xs">*/
/*                                                         <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">*/
/*                                                             <span class="sr-only">60% Complete</span>*/
/*                                                         </div>*/
/*                                                     </div>*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                             <!-- end task item -->*/
/*                                             <li><!-- Task item -->*/
/*                                                 <a href="#">*/
/*                                                     <h3>*/
/*                                                         Make beautiful transitions*/
/*                                                         <small class="pull-right">80%</small>*/
/*                                                     </h3>*/
/*                                                     <div class="progress xs">*/
/*                                                         <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">*/
/*                                                             <span class="sr-only">80% Complete</span>*/
/*                                                         </div>*/
/*                                                     </div>*/
/*                                                 </a>*/
/*                                             </li>*/
/*                                             <!-- end task item -->*/
/*                                         </ul>*/
/*                                     </li>*/
/*                                     <li class="footer">*/
/*                                         <a href="#">View all tasks</a>*/
/*                                     </li>*/
/*                                 </ul>*/
/*                             </li>*/
/*                             <!-- User Account: style can be found in dropdown.less -->*/
/*                             <li class="dropdown user user-menu">*/
/*                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">*/
/*                                     <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">*/
/*                                     <span class="hidden-xs">Alexander Pierce</span>*/
/*                                 </a>*/
/*                                 <ul class="dropdown-menu">*/
/*                                     <!-- User image -->*/
/*                                     <li class="user-header">*/
/*                                         <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">*/
/* */
/*                                         <p>*/
/*                                             Alexander Pierce - Web Developer*/
/*                                             <small>Member since Nov. 2012</small>*/
/*                                         </p>*/
/*                                     </li>*/
/*                                     <!-- Menu Body -->*/
/*                                     <li class="user-body">*/
/*                                         <div class="row">*/
/*                                             <div class="col-xs-4 text-center">*/
/*                                                 <a href="#">Followers</a>*/
/*                                             </div>*/
/*                                             <div class="col-xs-4 text-center">*/
/*                                                 <a href="#">Sales</a>*/
/*                                             </div>*/
/*                                             <div class="col-xs-4 text-center">*/
/*                                                 <a href="#">Friends</a>*/
/*                                             </div>*/
/*                                         </div>*/
/*                                         <!-- /.row -->*/
/*                                     </li>*/
/*                                     <!-- Menu Footer-->*/
/*                                     <li class="user-footer">*/
/*                                         <div class="pull-left">*/
/*                                             <a href="#" class="btn btn-default btn-flat">Profile</a>*/
/*                                         </div>*/
/*                                         <div class="pull-right">*/
/*                                             <a href="{{base_url}}login/logout" class="btn btn-default btn-flat">Sign out</a>*/
/*                                         </div>*/
/*                                     </li>*/
/*                                 </ul>*/
/*                             </li>*/
/*                             <!-- Control Sidebar Toggle Button -->*/
/*                             <li>*/
/*                                 <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>*/
/*                             </li>*/
/*                         </ul>*/
/*                     </div>*/
/*                 </nav>*/
/*             </header>*/
/*             <!-- Left side column. contains the logo and sidebar -->*/
/*             <aside class="main-sidebar">*/
/*                 <!-- sidebar: style can be found in sidebar.less -->*/
/*                 <section class="sidebar">*/
/*                     <!-- Sidebar user panel -->*/
/*                     <div class="user-panel">*/
/*                         <div class="pull-left image">*/
/*                             <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">*/
/*                         </div>*/
/*                         <div class="pull-left info">*/
/*                             <p>Alexander Pierce</p>*/
/*                             <a href="#"><i class="fa fa-circle text-success"></i> Online</a>*/
/*                         </div>*/
/*                     </div>*/
/*                     <!-- search form -->*/
/*                     <form action="#" method="get" class="sidebar-form">*/
/*                         <div class="input-group">*/
/*                             <input type="text" name="q" class="form-control" placeholder="Search...">*/
/*                             <span class="input-group-btn">*/
/*                                 <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>*/
/*                                 </button>*/
/*                             </span>*/
/*                         </div>*/
/*                     </form>*/
/*                     <!-- /.search form -->*/
/*                     <!-- sidebar menu: : style can be found in sidebar.less -->*/
/*                     <ul class="sidebar-menu">*/
/*                         <li class="header">MAIN NAVIGATION</li>*/
/*                         <li class="active treeview">*/
/*                             <a href="#">*/
/*                                 <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>*/
/*                             </a>*/
/*                             <ul class="treeview-menu">*/
/*                                 <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>*/
/*                                 <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>*/
/*                             </ul>*/
/*                         </li>*/
/*                         <li class="treeview">*/
/*                             <a href="#">*/
/*                                 <i class="fa fa-files-o"></i>*/
/*                                 <span>Layout Options</span>*/
/*                                 <span class="label label-primary pull-right">4</span>*/
/*                             </a>*/
/*                             <ul class="treeview-menu">*/
/*                                 <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>*/
/*                                 <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>*/
/*                                 <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>*/
/*                                 <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>*/
/*                             </ul>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="pages/widgets.html">*/
/*                                 <i class="fa fa-th"></i> <span>Widgets</span>*/
/*                                 <small class="label pull-right bg-green">new</small>*/
/*                             </a>*/
/*                         </li>*/
/*                         <li class="treeview">*/
/*                             <a href="#">*/
/*                                 <i class="fa fa-pie-chart"></i>*/
/*                                 <span>Charts</span>*/
/*                                 <i class="fa fa-angle-left pull-right"></i>*/
/*                             </a>*/
/*                             <ul class="treeview-menu">*/
/*                                 <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>*/
/*                                 <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>*/
/*                                 <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>*/
/*                                 <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>*/
/*                             </ul>*/
/*                         </li>*/
/*                         <li class="treeview">*/
/*                             <a href="#">*/
/*                                 <i class="fa fa-laptop"></i>*/
/*                                 <span>UI Elements</span>*/
/*                                 <i class="fa fa-angle-left pull-right"></i>*/
/*                             </a>*/
/*                             <ul class="treeview-menu">*/
/*                                 <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>*/
/*                                 <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>*/
/*                                 <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>*/
/*                                 <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>*/
/*                                 <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>*/
/*                                 <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>*/
/*                             </ul>*/
/*                         </li>*/
/*                         <li class="treeview">*/
/*                             <a href="#">*/
/*                                 <i class="fa fa-edit"></i> <span>Forms</span>*/
/*                                 <i class="fa fa-angle-left pull-right"></i>*/
/*                             </a>*/
/*                             <ul class="treeview-menu">*/
/*                                 <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>*/
/*                                 <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>*/
/*                                 <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>*/
/*                             </ul>*/
/*                         </li>*/
/*                         <li class="treeview">*/
/*                             <a href="#">*/
/*                                 <i class="fa fa-table"></i> <span>Tables</span>*/
/*                                 <i class="fa fa-angle-left pull-right"></i>*/
/*                             </a>*/
/*                             <ul class="treeview-menu">*/
/*                                 <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>*/
/*                                 <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>*/
/*                             </ul>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="pages/calendar.html">*/
/*                                 <i class="fa fa-calendar"></i> <span>Calendar</span>*/
/*                                 <small class="label pull-right bg-red">3</small>*/
/*                             </a>*/
/*                         </li>*/
/*                         <li>*/
/*                             <a href="pages/mailbox/mailbox.html">*/
/*                                 <i class="fa fa-envelope"></i> <span>Mailbox</span>*/
/*                                 <small class="label pull-right bg-yellow">12</small>*/
/*                             </a>*/
/*                         </li>*/
/*                         <li class="treeview">*/
/*                             <a href="#">*/
/*                                 <i class="fa fa-folder"></i> <span>Examples</span>*/
/*                                 <i class="fa fa-angle-left pull-right"></i>*/
/*                             </a>*/
/*                             <ul class="treeview-menu">*/
/*                                 <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>*/
/*                                 <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>*/
/*                                 <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>*/
/*                                 <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>*/
/*                                 <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>*/
/*                                 <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>*/
/*                                 <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>*/
/*                                 <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>*/
/*                                 <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>*/
/*                             </ul>*/
/*                         </li>*/
/*                         <li class="treeview">*/
/*                             <a href="#">*/
/*                                 <i class="fa fa-share"></i> <span>Multilevel</span>*/
/*                                 <i class="fa fa-angle-left pull-right"></i>*/
/*                             </a>*/
/*                             <ul class="treeview-menu">*/
/*                                 <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>*/
/*                                 <li>*/
/*                                     <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>*/
/*                                     <ul class="treeview-menu">*/
/*                                         <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>*/
/*                                         <li>*/
/*                                             <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>*/
/*                                             <ul class="treeview-menu">*/
/*                                                 <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>*/
/*                                                 <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>*/
/*                                             </ul>*/
/*                                         </li>*/
/*                                     </ul>*/
/*                                 </li>*/
/*                                 <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>*/
/*                             </ul>*/
/*                         </li>*/
/*                         <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>*/
/*                         <li class="header">LABELS</li>*/
/*                         <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>*/
/*                         <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>*/
/*                         <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>*/
/*                     </ul>*/
/*                 </section>*/
/*                 <!-- /.sidebar -->*/
/*             </aside>*/
/* */
/*             <!-- Content Wrapper. Contains page content -->*/
/*             <div class="content-wrapper">*/
/*                 <!-- Content Header (Page header) -->*/
/*                 {% block content_header %}*/
/*                 {% endblock %}*/
/*                 */
/*                 <!-- Main content -->*/
/*                 {% block content %}*/
/*                 {% endblock %}*/
/*                 <!-- /.content -->*/
/*             </div>*/
/*             <!-- /.content-wrapper -->*/
/*             <footer class="main-footer">*/
/*                 <div class="pull-right hidden-xs">*/
/*                     <b>Version</b> 2.3.1*/
/*                 </div>*/
/*                 <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights*/
/*                 reserved.*/
/*             </footer>*/
/* */
/*             <!-- Control Sidebar -->*/
/*             <aside class="control-sidebar control-sidebar-dark">*/
/*                 <!-- Create the tabs -->*/
/*                 <ul class="nav nav-tabs nav-justified control-sidebar-tabs">*/
/*                     <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>*/
/*                     <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>*/
/*                 </ul>*/
/*                 <!-- Tab panes -->*/
/*                 <div class="tab-content">*/
/*                     <!-- Home tab content -->*/
/*                     <div class="tab-pane" id="control-sidebar-home-tab">*/
/*                         <h3 class="control-sidebar-heading">Recent Activity</h3>*/
/*                         <ul class="control-sidebar-menu">*/
/*                             <li>*/
/*                                 <a href="javascript::;">*/
/*                                     <i class="menu-icon fa fa-birthday-cake bg-red"></i>*/
/* */
/*                                     <div class="menu-info">*/
/*                                         <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>*/
/* */
/*                                         <p>Will be 23 on April 24th</p>*/
/*                                     </div>*/
/*                                 </a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="javascript::;">*/
/*                                     <i class="menu-icon fa fa-user bg-yellow"></i>*/
/* */
/*                                     <div class="menu-info">*/
/*                                         <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>*/
/* */
/*                                         <p>New phone +1(800)555-1234</p>*/
/*                                     </div>*/
/*                                 </a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="javascript::;">*/
/*                                     <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>*/
/* */
/*                                     <div class="menu-info">*/
/*                                         <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>*/
/* */
/*                                         <p>nora@example.com</p>*/
/*                                     </div>*/
/*                                 </a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="javascript::;">*/
/*                                     <i class="menu-icon fa fa-file-code-o bg-green"></i>*/
/* */
/*                                     <div class="menu-info">*/
/*                                         <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>*/
/* */
/*                                         <p>Execution time 5 seconds</p>*/
/*                                     </div>*/
/*                                 </a>*/
/*                             </li>*/
/*                         </ul>*/
/*                         <!-- /.control-sidebar-menu -->*/
/* */
/*                         <h3 class="control-sidebar-heading">Tasks Progress</h3>*/
/*                         <ul class="control-sidebar-menu">*/
/*                             <li>*/
/*                                 <a href="javascript::;">*/
/*                                     <h4 class="control-sidebar-subheading">*/
/*                                         Custom Template Design*/
/*                                         <span class="label label-danger pull-right">70%</span>*/
/*                                     </h4>*/
/* */
/*                                     <div class="progress progress-xxs">*/
/*                                         <div class="progress-bar progress-bar-danger" style="width: 70%"></div>*/
/*                                     </div>*/
/*                                 </a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="javascript::;">*/
/*                                     <h4 class="control-sidebar-subheading">*/
/*                                         Update Resume*/
/*                                         <span class="label label-success pull-right">95%</span>*/
/*                                     </h4>*/
/* */
/*                                     <div class="progress progress-xxs">*/
/*                                         <div class="progress-bar progress-bar-success" style="width: 95%"></div>*/
/*                                     </div>*/
/*                                 </a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="javascript::;">*/
/*                                     <h4 class="control-sidebar-subheading">*/
/*                                         Laravel Integration*/
/*                                         <span class="label label-warning pull-right">50%</span>*/
/*                                     </h4>*/
/* */
/*                                     <div class="progress progress-xxs">*/
/*                                         <div class="progress-bar progress-bar-warning" style="width: 50%"></div>*/
/*                                     </div>*/
/*                                 </a>*/
/*                             </li>*/
/*                             <li>*/
/*                                 <a href="javascript::;">*/
/*                                     <h4 class="control-sidebar-subheading">*/
/*                                         Back End Framework*/
/*                                         <span class="label label-primary pull-right">68%</span>*/
/*                                     </h4>*/
/* */
/*                                     <div class="progress progress-xxs">*/
/*                                         <div class="progress-bar progress-bar-primary" style="width: 68%"></div>*/
/*                                     </div>*/
/*                                 </a>*/
/*                             </li>*/
/*                         </ul>*/
/*                         <!-- /.control-sidebar-menu -->*/
/* */
/*                     </div>*/
/*                     <!-- /.tab-pane -->*/
/*                     <!-- Stats tab content -->*/
/*                     <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>*/
/*                     <!-- /.tab-pane -->*/
/*                     <!-- Settings tab content -->*/
/*                     <div class="tab-pane" id="control-sidebar-settings-tab">*/
/*                         <form method="post">*/
/*                             <h3 class="control-sidebar-heading">General Settings</h3>*/
/* */
/*                             <div class="form-group">*/
/*                                 <label class="control-sidebar-subheading">*/
/*                                     Report panel usage*/
/*                                     <input type="checkbox" class="pull-right" checked>*/
/*                                 </label>*/
/* */
/*                                 <p>*/
/*                                     Some information about this general settings option*/
/*                                 </p>*/
/*                             </div>*/
/*                             <!-- /.form-group -->*/
/* */
/*                             <div class="form-group">*/
/*                                 <label class="control-sidebar-subheading">*/
/*                                     Allow mail redirect*/
/*                                     <input type="checkbox" class="pull-right" checked>*/
/*                                 </label>*/
/* */
/*                                 <p>*/
/*                                     Other sets of options are available*/
/*                                 </p>*/
/*                             </div>*/
/*                             <!-- /.form-group -->*/
/* */
/*                             <div class="form-group">*/
/*                                 <label class="control-sidebar-subheading">*/
/*                                     Expose author name in posts*/
/*                                     <input type="checkbox" class="pull-right" checked>*/
/*                                 </label>*/
/* */
/*                                 <p>*/
/*                                     Allow the user to show his name in blog posts*/
/*                                 </p>*/
/*                             </div>*/
/*                             <!-- /.form-group -->*/
/* */
/*                             <h3 class="control-sidebar-heading">Chat Settings</h3>*/
/* */
/*                             <div class="form-group">*/
/*                                 <label class="control-sidebar-subheading">*/
/*                                     Show me as online*/
/*                                     <input type="checkbox" class="pull-right" checked>*/
/*                                 </label>*/
/*                             </div>*/
/*                             <!-- /.form-group -->*/
/* */
/*                             <div class="form-group">*/
/*                                 <label class="control-sidebar-subheading">*/
/*                                     Turn off notifications*/
/*                                     <input type="checkbox" class="pull-right">*/
/*                                 </label>*/
/*                             </div>*/
/*                             <!-- /.form-group -->*/
/* */
/*                             <div class="form-group">*/
/*                                 <label class="control-sidebar-subheading">*/
/*                                     Delete chat history*/
/*                                     <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>*/
/*                                 </label>*/
/*                             </div>*/
/*                             <!-- /.form-group -->*/
/*                         </form>*/
/*                     </div>*/
/*                     <!-- /.tab-pane -->*/
/*                 </div>*/
/*             </aside>*/
/*             <!-- /.control-sidebar -->*/
/*             <!-- Add the sidebar's background. This div must be placed*/
/*                  immediately after the control sidebar -->*/
/*             <div class="control-sidebar-bg"></div>*/
/*         </div>*/
/*         <!-- ./wrapper -->*/
/*         {% block js %}*/
/*             <!-- jQuery 2.1.4 -->*/
/*             <script src="{{base_url}}public/plugins/jQuery/jQuery-2.1.4.min.js"></script>*/
/*             <!-- jQuery UI 1.11.4 -->*/
/*             <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>*/
/*             <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->*/
/*             <script>*/
/*                 $.widget.bridge('uibutton', $.ui.button);*/
/*             </script>*/
/*             <!-- Bootstrap 3.3.5 -->*/
/*             <script src="{{base_url}}public/bootstrap/js/bootstrap.min.js"></script>*/
/*             <!-- Morris.js charts -->*/
/*             <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>*/
/*             <script src="{{base_url}}public/plugins/morris/morris.min.js"></script>*/
/*             <!-- Sparkline -->*/
/*             <script src="{{base_url}}public/plugins/sparkline/jquery.sparkline.min.js"></script>*/
/*             <!-- jvectormap -->*/
/*             <script src="{{base_url}}public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>*/
/*             <script src="{{base_url}}public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>*/
/*             <!-- jQuery Knob Chart -->*/
/*             <script src="{{base_url}}public/plugins/knob/jquery.knob.js"></script>*/
/*             <!-- daterangepicker -->*/
/*             <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>*/
/*             <script src="{{base_url}}public/plugins/daterangepicker/daterangepicker.js"></script>*/
/*             <!-- datepicker -->*/
/*             <script src="{{base_url}}public/plugins/datepicker/bootstrap-datepicker.js"></script>*/
/*             <!-- Bootstrap WYSIHTML5 -->*/
/*             <script src="{{base_url}}public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>*/
/*             <!-- Slimscroll -->*/
/*             <script src="{{base_url}}public/plugins/slimScroll/jquery.slimscroll.min.js"></script>*/
/*             <!-- FastClick -->*/
/*             <script src="{{base_url}}public/plugins/fastclick/fastclick.js"></script>*/
/*             <!-- AdminLTE App -->*/
/*             <script src="{{base_url}}public/dist/js/app.min.js"></script>*/
/*             <!-- AdminLTE dashboard demo (This is only for demo purposes) -->*/
/*             <script src="{{base_url}}public/dist/js/pages/dashboard.js"></script>*/
/*             <!-- AdminLTE for demo purposes -->*/
/*             <script src="{{base_url}}public/dist/js/demo.js"></script>*/
/*         {% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
