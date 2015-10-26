<?php

/* admin/deletarUsuario.twig */
class __TwigTemplate_acdaedc9f5002ebfe190ae40861348c5c4456e36519f2cfb8fc99a50989fc69e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base_layout.twig", "admin/deletarUsuario.twig", 1);
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
        echo "Deletar Usuário";
    }

    // line 4
    public function block_content_header($context, array $blocks = array())
    {
        // line 5
        echo "    <section class=\"content-header\">
        <h1>
            Área Administrador
            <small>Deletar usuário</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
            <li class=\"active\">Deletar Usuário</li>
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
        echo "admin/deletarUsuarioSelecionado/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : null), "UsuarioID", array()), "html", null, true);
        echo "\" method=\"post\">
                    <div class=\"box-body\">
                        <div class=\"form-group\">
                            <label for=\"login\">Nome usuário</label>
                            <input type=\"text\" class=\"form-control\" id=\"login\" name=\"login\" placeholder=\"Digite o Nome\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : null), "LOGIN", array()), "html", null, true);
        echo "\" disabled>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"exampleInputEmail1\">Perfil</label>
                            <select class=\"form-control\" name=\"perfil\" disabled>
                                ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["tiposPerfis"]) ? $context["tiposPerfis"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["Perfil"]) {
            // line 33
            echo "                                    ";
            if (($this->getAttribute($context["Perfil"], "TipoPerfilID", array()) == $this->getAttribute((isset($context["usuario"]) ? $context["usuario"] : null), "TipoPerfil", array()))) {
                // line 34
                echo "                                        <option selected=\"selected\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["Perfil"], "TipoPerfilID", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["Perfil"], "DescricaoTipoPerfis", array()), "html", null, true);
                echo "</option>
                                    ";
            } else {
                // line 36
                echo "                                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["Perfil"], "TipoPerfilID", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["Perfil"], "DescricaoTipoPerfis", array()), "html", null, true);
                echo "</option>
                                    ";
            }
            // line 38
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Perfil'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "                            </select>                        
                        </div>                   
                    </div>
                    <div class=\"box-footer\">
                        <button type=\"submit\" class=\"btn btn-primary\">Deletar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
";
    }

    public function getTemplateName()
    {
        return "admin/deletarUsuario.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 39,  104 => 38,  96 => 36,  88 => 34,  85 => 33,  81 => 32,  73 => 27,  64 => 23,  56 => 17,  53 => 16,  39 => 5,  36 => 4,  30 => 2,  11 => 1,);
    }
}
/* {% extends "base_layout.twig" %}*/
/* {% block title %}Deletar Usuário{% endblock %}*/
/* */
/* {% block content_header %}*/
/*     <section class="content-header">*/
/*         <h1>*/
/*             Área Administrador*/
/*             <small>Deletar usuário</small>*/
/*         </h1>*/
/*         <ol class="breadcrumb">*/
/*             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>*/
/*             <li class="active">Deletar Usuário</li>*/
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
/*                 <form role="form" action="{{base_url}}admin/deletarUsuarioSelecionado/{{ usuario.UsuarioID }}" method="post">*/
/*                     <div class="box-body">*/
/*                         <div class="form-group">*/
/*                             <label for="login">Nome usuário</label>*/
/*                             <input type="text" class="form-control" id="login" name="login" placeholder="Digite o Nome" value="{{ usuario.LOGIN }}" disabled>*/
/*                         </div>*/
/*                         <div class="form-group">*/
/*                             <label for="exampleInputEmail1">Perfil</label>*/
/*                             <select class="form-control" name="perfil" disabled>*/
/*                                 {% for Perfil in tiposPerfis %}*/
/*                                     {% if Perfil.TipoPerfilID == usuario.TipoPerfil %}*/
/*                                         <option selected="selected" value="{{ Perfil.TipoPerfilID }}">{{ Perfil.DescricaoTipoPerfis }}</option>*/
/*                                     {% else %}*/
/*                                         <option value="{{ Perfil.TipoPerfilID }}">{{ Perfil.DescricaoTipoPerfis }}</option>*/
/*                                     {% endif %}*/
/*                                 {% endfor %}*/
/*                             </select>                        */
/*                         </div>                   */
/*                     </div>*/
/*                     <div class="box-footer">*/
/*                         <button type="submit" class="btn btn-primary">Deletar</button>*/
/*                     </div>*/
/*                 </form>*/
/*             </div>*/
/*         </div>*/
/*     </section>*/
/* {% endblock %}  */
