<?php

/* admin/incluirUsuario.twig */
class __TwigTemplate_bf5f23ca9d0090a162b4a81b0f4bf118e3d1b976bd4e27893a3b317de3e6ec50 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base_layout.twig", "admin/incluirUsuario.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content_header' => array($this, 'block_content_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base_layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Novo Usuário";
    }

    // line 4
    public function block_content_header($context, array $blocks = array())
    {
        // line 5
        echo "    <section class=\"content-header\">
        <h1>
            Área Administrador
            <small>Novo usuário</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
            <li class=\"active\">Novo Usuário</li>
        </ol>
    </section>
";
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "    <section class=\"content\">
        <div class=\"col-md-12\">
            <div class=\"box box-primary\">
                <div class=\"box-header with-border\">
                    <h3 class=\"box-title\">Dados do usuário</h3>
                </div>
                <form role=\"form\" action=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
        echo "admin/incluirNovoUsuario\" method=\"post\">
                    <div class=\"box-body\">
                        <div class=\"form-group\">
                            <label for=\"login\">Nome usuário</label>
                            <input type=\"text\" class=\"form-control\" id=\"login\" name=\"login\" placeholder=\"Digite o Nome\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"exampleInputEmail1\">Perfil</label>
                            <select class=\"form-control\" name=\"perfil\">
                                ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tiposPerfis"]) ? $context["tiposPerfis"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["Perfil"]) {
            // line 33
            echo "                                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Perfil"], "TipoPerfilID", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Perfil"], "DescricaoTipoPerfis", array()), "html", null, true);
            echo "</option>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Perfil'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "                            </select>                        
                        </div>
                        <div class=\"form-group\">
                            <label for=\"senha1\">Senha</label>
                            <input type=\"password\" class=\"form-control\" id=\"senha1\" name=\"senha1\" placeholder=\"Digite o Nome\">
                        </div>
                        <div class=\"form-group\">
                            <label for=\"senha2\">Repita a senha</label>
                            <input type=\"password\" class=\"form-control\" id=\"senha2\" name=\"senha2\" placeholder=\"Digite o Nome\">
                        </div>                        
                    </div>
                    <div class=\"box-footer\">
                        <button type=\"submit\" class=\"btn btn-primary\">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
";
    }

    public function getTemplateName()
    {
        return "admin/incluirUsuario.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 35,  80 => 33,  76 => 32,  64 => 23,  56 => 17,  53 => 16,  39 => 5,  36 => 4,  30 => 2,  11 => 1,);
    }
}
/* {% extends "base_layout.twig" %}*/
/* {% block title %}Novo Usuário{% endblock %}*/
/* */
/* {% block content_header %}*/
/*     <section class="content-header">*/
/*         <h1>*/
/*             Área Administrador*/
/*             <small>Novo usuário</small>*/
/*         </h1>*/
/*         <ol class="breadcrumb">*/
/*             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>*/
/*             <li class="active">Novo Usuário</li>*/
/*         </ol>*/
/*     </section>*/
/* {% endblock %}*/
/* {% block content %}*/
/*     <section class="content">*/
/*         <div class="col-md-12">*/
/*             <div class="box box-primary">*/
/*                 <div class="box-header with-border">*/
/*                     <h3 class="box-title">Dados do usuário</h3>*/
/*                 </div>*/
/*                 <form role="form" action="{{base_url}}admin/incluirNovoUsuario" method="post">*/
/*                     <div class="box-body">*/
/*                         <div class="form-group">*/
/*                             <label for="login">Nome usuário</label>*/
/*                             <input type="text" class="form-control" id="login" name="login" placeholder="Digite o Nome">*/
/*                         </div>*/
/*                         <div class="form-group">*/
/*                             <label for="exampleInputEmail1">Perfil</label>*/
/*                             <select class="form-control" name="perfil">*/
/*                                 {% for Perfil in tiposPerfis %}*/
/*                                     <option value="{{ Perfil.TipoPerfilID }}">{{ Perfil.DescricaoTipoPerfis }}</option>*/
/*                                 {% endfor %}*/
/*                             </select>                        */
/*                         </div>*/
/*                         <div class="form-group">*/
/*                             <label for="senha1">Senha</label>*/
/*                             <input type="password" class="form-control" id="senha1" name="senha1" placeholder="Digite o Nome">*/
/*                         </div>*/
/*                         <div class="form-group">*/
/*                             <label for="senha2">Repita a senha</label>*/
/*                             <input type="password" class="form-control" id="senha2" name="senha2" placeholder="Digite o Nome">*/
/*                         </div>                        */
/*                     </div>*/
/*                     <div class="box-footer">*/
/*                         <button type="submit" class="btn btn-primary">Cadastrar</button>*/
/*                     </div>*/
/*                 </form>*/
/*             </div>*/
/*         </div>*/
/*     </section>*/
/* {% endblock %}*/
