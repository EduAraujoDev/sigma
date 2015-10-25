<?php

/* login.twig */
class __TwigTemplate_91732a2fae17d5a2b1adc532eb5fd62e9c28d80626cac51ae109f6b3dc9b738f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
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
        <title>Sigma | Log in</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
        <!-- Bootstrap 3.3.5 -->
        <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/bootstrap/css/bootstrap.min.css\">
        <!-- Font Awesome -->
        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css\">
        <!-- Ionicons -->
        <link rel=\"stylesheet\" href=\"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css\">
        <!-- Theme style -->
        <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/dist/css/AdminLTE.min.css\">
        <!-- iCheck -->
        <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/iCheck/square/blue.css\">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
        <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
        <![endif]-->

    </head>
    <body class=\"hold-transition login-page\">
        <div class=\"login-box\">
            <div class=\"login-logo\">
                <a href=\"";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "\"><b>Sigma</b> Dashboard</a>
            </div>
            <!-- /.login-logo -->
            <div class=\"login-box-body\">
                <p class=\"login-box-msg\">Digite seu email e sua senha para logar</p>
                <form action=\"";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "login/validarUsuario\" method=\"post\">
                    <div class=\"form-group has-feedback\">
                        <!-- <input type=\"email\" name=\"usuario\" class=\"form-control\" placeholder=\"Email\"> -->
                        <input type=\"text\" name=\"usuario\" class=\"form-control\" placeholder=\"Login\">
                        <span class=\"glyphicon glyphicon-envelope form-control-feedback\"></span>
                    </div>
                    <div class=\"form-group has-feedback\">
                        <input type=\"password\" name=\"senha\" class=\"form-control\" placeholder=\"Senha\">
                        <span class=\"glyphicon glyphicon-lock form-control-feedback\"></span>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-xs-8\">
                            <div class=\"checkbox icheck\">
                                <label>
                                    <input type=\"checkbox\"> Lembrar de mim?
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class=\"col-xs-4\">
                            <button type=\"submit\" class=\"btn btn-primary btn-block btn-flat\">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href=\"#\">Esqueceu a senha?</a><br>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.1.4 -->
        <script src=\"";
        // line 69
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/jQuery/jQuery-2.1.4.min.js\"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src=\"";
        // line 71
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/bootstrap/js/bootstrap.min.js\"></script>
        <!-- iCheck -->
        <script src=\"";
        // line 73
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "public/plugins/iCheck/icheck.min.js\"></script>
        <script>
            \$(function () {
                \$('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 73,  109 => 71,  104 => 69,  69 => 37,  61 => 32,  45 => 19,  40 => 17,  31 => 11,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="utf-8">*/
/*         <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*         <title>Sigma | Log in</title>*/
/* */
/*         <!-- Tell the browser to be responsive to screen width -->*/
/*         <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">*/
/*         <!-- Bootstrap 3.3.5 -->*/
/*         <link rel="stylesheet" href="{{base_url}}public/bootstrap/css/bootstrap.min.css">*/
/*         <!-- Font Awesome -->*/
/*         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">*/
/*         <!-- Ionicons -->*/
/*         <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">*/
/*         <!-- Theme style -->*/
/*         <link rel="stylesheet" href="{{base_url}}public/dist/css/AdminLTE.min.css">*/
/*         <!-- iCheck -->*/
/*         <link rel="stylesheet" href="{{base_url}}public/plugins/iCheck/square/blue.css">*/
/* */
/*         <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/*         <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*         <!--[if lt IE 9]>*/
/*         <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>*/
/*         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>*/
/*         <![endif]-->*/
/* */
/*     </head>*/
/*     <body class="hold-transition login-page">*/
/*         <div class="login-box">*/
/*             <div class="login-logo">*/
/*                 <a href="{{base_url}}"><b>Sigma</b> Dashboard</a>*/
/*             </div>*/
/*             <!-- /.login-logo -->*/
/*             <div class="login-box-body">*/
/*                 <p class="login-box-msg">Digite seu email e sua senha para logar</p>*/
/*                 <form action="{{base_url}}login/validarUsuario" method="post">*/
/*                     <div class="form-group has-feedback">*/
/*                         <!-- <input type="email" name="usuario" class="form-control" placeholder="Email"> -->*/
/*                         <input type="text" name="usuario" class="form-control" placeholder="Login">*/
/*                         <span class="glyphicon glyphicon-envelope form-control-feedback"></span>*/
/*                     </div>*/
/*                     <div class="form-group has-feedback">*/
/*                         <input type="password" name="senha" class="form-control" placeholder="Senha">*/
/*                         <span class="glyphicon glyphicon-lock form-control-feedback"></span>*/
/*                     </div>*/
/*                     <div class="row">*/
/*                         <div class="col-xs-8">*/
/*                             <div class="checkbox icheck">*/
/*                                 <label>*/
/*                                     <input type="checkbox"> Lembrar de mim?*/
/*                                 </label>*/
/*                             </div>*/
/*                         </div>*/
/*                         <!-- /.col -->*/
/*                         <div class="col-xs-4">*/
/*                             <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>*/
/*                         </div>*/
/*                         <!-- /.col -->*/
/*                     </div>*/
/*                 </form>*/
/*                 <a href="#">Esqueceu a senha?</a><br>*/
/*             </div>*/
/*             <!-- /.login-box-body -->*/
/*         </div>*/
/*         <!-- /.login-box -->*/
/* */
/*         <!-- jQuery 2.1.4 -->*/
/*         <script src="{{base_url}}public/plugins/jQuery/jQuery-2.1.4.min.js"></script>*/
/*         <!-- Bootstrap 3.3.5 -->*/
/*         <script src="{{base_url}}public/bootstrap/js/bootstrap.min.js"></script>*/
/*         <!-- iCheck -->*/
/*         <script src="{{base_url}}public/plugins/iCheck/icheck.min.js"></script>*/
/*         <script>*/
/*             $(function () {*/
/*                 $('input').iCheck({*/
/*                     checkboxClass: 'icheckbox_square-blue',*/
/*                     radioClass: 'iradio_square-blue',*/
/*                     increaseArea: '20%' // optional*/
/*                 });*/
/*             });*/
/*         </script>*/
/*     </body>*/
/* </html>*/
/* */
