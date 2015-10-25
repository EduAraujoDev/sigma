<?php

/* admin/listar.twig */
class __TwigTemplate_cbcdbee939af23bed4ee6fd9358496fc218a8acf00f209534ee91b6af1a0b2fd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base_layout.twig", "admin/listar.twig", 1);
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
        echo "Dashboard";
    }

    // line 4
    public function block_content_header($context, array $blocks = array())
    {
        // line 5
        echo "    <section class=\"content-header\">
        <h1>
            Dashboard Administrador
            <small>Control panel</small>
        </h1>
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
            <li class=\"active\">Dashboard Administrador</li>
        </ol>
    </section>
";
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        // line 18
        echo "

";
    }

    public function getTemplateName()
    {
        return "admin/listar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 18,  53 => 17,  39 => 5,  36 => 4,  30 => 2,  11 => 1,);
    }
}
/* {% extends "base_layout.twig" %}*/
/* {% block title %}Dashboard{% endblock %}*/
/* */
/* {% block content_header %}*/
/*     <section class="content-header">*/
/*         <h1>*/
/*             Dashboard Administrador*/
/*             <small>Control panel</small>*/
/*         </h1>*/
/*         <ol class="breadcrumb">*/
/*             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>*/
/*             <li class="active">Dashboard Administrador</li>*/
/*         </ol>*/
/*     </section>*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/* */
/* {% endblock %}	*/
