<?php

/* admin/listarUsuario.twig */
class __TwigTemplate_f657d495c2f241e955eee0722ed39642b73e9edeb5eee6a851f7bdf41dd2c59e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base_layout.twig", "admin/listarUsuario.twig", 1);
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
        echo "Listar Usuário";
    }

    // line 4
    public function block_content_header($context, array $blocks = array())
    {
        // line 5
        echo "    <section class=\"content-header\">
        <h1>
            Área Administrador
            <small>Listar usuário</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
            <li class=\"active\">Listar Usuário</li>
        </ol>
    </section>
";
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
        // line 17
        echo "    <section class=\"content\">
        <div class=\"col-xs-12\">
            <div class=\"box\">
                <div class=\"box-body\">
                    <div class=\"dataTables_wrapper form-inline dt-bootstrap\">
                        <div class=\"row\">
                            <div class=\"col-sm-12\">
                                <table class=\"table table-bordered table-hover dataTable\" role=\"grid\" aria-describedby=\"example2_info\">
                                    <thead>
                                        <tr role=\"row\">
                                            <th class=\"sorting_asc\" tabindex=\"0\" aria-controls=\"example2\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\" aria-label=\"Rendering engine: activate to sort column descending\">Id</th>
                                            <th class=\"sorting_asc\" tabindex=\"0\" aria-controls=\"example2\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\" aria-label=\"Rendering engine: activate to sort column descending\">Nome Usuário</th>
                                            <th class=\"sorting_asc\" tabindex=\"0\" aria-controls=\"example2\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\" aria-label=\"Rendering engine: activate to sort column descending\">Perfil</th>
                                            <th class=\"sorting_asc\" tabindex=\"0\" aria-controls=\"example2\" rowspan=\"1\" colspan=\"1\" aria-sort=\"ascending\" aria-label=\"Rendering engine: activate to sort column descending\">Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["usuarios"]) ? $context["usuarios"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["usuario"]) {
            // line 35
            echo "                                            <tr>
                                                <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["usuario"], "UsuarioID", array()), "html", null, true);
            echo "</td>
                                                <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($context["usuario"], "LOGIN", array()), "html", null, true);
            echo "</td>
                                                <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($context["usuario"], "DescricaoTipoPerfis", array()), "html", null, true);
            echo "</td>
                                                <td>
                                                    <a class=\"btn btn-primary btn-xs\" href=\"";
            // line 40
            echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
            echo "admin/alterarUsuario/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["usuario"], "UsuarioID", array()), "html", null, true);
            echo "\">Alterar</a>
                                                    <a class=\"btn btn-danger btn-xs\" href=\"";
            // line 41
            echo twig_escape_filter($this->env, (isset($context["base_url"]) ? $context["base_url"] : null), "html", null, true);
            echo "admin/deletarUsuario/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["usuario"], "UsuarioID", array()), "html", null, true);
            echo "\">Excluir</a>
                                                </td>
                                            </tr>
                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['usuario'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
    }

    public function getTemplateName()
    {
        return "admin/listarUsuario.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 45,  101 => 41,  95 => 40,  90 => 38,  86 => 37,  82 => 36,  79 => 35,  75 => 34,  56 => 17,  53 => 16,  39 => 5,  36 => 4,  30 => 2,  11 => 1,);
    }
}
/* {% extends "base_layout.twig" %}*/
/* {% block title %}Listar Usuário{% endblock %}*/
/* */
/* {% block content_header %}*/
/*     <section class="content-header">*/
/*         <h1>*/
/*             Área Administrador*/
/*             <small>Listar usuário</small>*/
/*         </h1>*/
/*         <ol class="breadcrumb">*/
/*             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>*/
/*             <li class="active">Listar Usuário</li>*/
/*         </ol>*/
/*     </section>*/
/* {% endblock %}*/
/* {% block content %}*/
/*     <section class="content">*/
/*         <div class="col-xs-12">*/
/*             <div class="box">*/
/*                 <div class="box-body">*/
/*                     <div class="dataTables_wrapper form-inline dt-bootstrap">*/
/*                         <div class="row">*/
/*                             <div class="col-sm-12">*/
/*                                 <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">*/
/*                                     <thead>*/
/*                                         <tr role="row">*/
/*                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id</th>*/
/*                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nome Usuário</th>*/
/*                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Perfil</th>*/
/*                                             <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ação</th>*/
/*                                         </tr>*/
/*                                     </thead>*/
/*                                     <tbody>*/
/*                                         {% for usuario in usuarios %}*/
/*                                             <tr>*/
/*                                                 <td>{{ usuario.UsuarioID }}</td>*/
/*                                                 <td>{{ usuario.LOGIN }}</td>*/
/*                                                 <td>{{ usuario.DescricaoTipoPerfis }}</td>*/
/*                                                 <td>*/
/*                                                     <a class="btn btn-primary btn-xs" href="{{base_url}}admin/alterarUsuario/{{ usuario.UsuarioID }}">Alterar</a>*/
/*                                                     <a class="btn btn-danger btn-xs" href="{{base_url}}admin/deletarUsuario/{{ usuario.UsuarioID }}">Excluir</a>*/
/*                                                 </td>*/
/*                                             </tr>*/
/*                                         {% endfor %}*/
/*                                     </tbody>*/
/*                                 </table>*/
/*                             </div>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/*     </section>*/
/* {% endblock %}	*/
