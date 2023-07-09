@extends('layouts.main')
@section('content')

<style>
.box-body li{list-style: none;}
    .reason{width:277px;height:254px}p{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:13px;line-height:18px;margin:0 0 9px}.label{background-color:#999;color:#FFF;font-size:11.05px;font-weight:700;text-shadow:0 -1px 0 rgba(0,0,0,.25);padding:1px 4px 3px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px}.label-success{background-color:#468847}.label-warning{background-color:#F89406}.label-important{background-color:#B94A48}.label-info{background-color:#3A87AD}.sub_title{margin:5px 0 0 170px;font-family:Arial,Helvetica,sans-serif!important;line-height:1.231;text-rendering:optimizeLegibility;display:block;font-weight:400;font-style:italic;font-size:12px;color:#aaa}label{width:23%!important}.form_default2 fieldset label{font-family:Arial,Helvetica,sans-serif;line-height:1.231;text-rendering:optimizeLegibility;font-size:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}.form_default2 label{width:250px}.form_default2 fieldset{width:auto;padding:25px;margin:5px 0 15px;border:0 solid #eee;display:block;-webkit-margin-start:2px;-webkit-margin-end:2px;-webkit-padding-before:.35em;-webkit-padding-start:.75em;-webkit-padding-end:.75em;-webkit-padding-after:.625em}.form_default2 fieldset>ul,.form_default2>ul{width:100%;list-style:disc;display:block;-webkit-margin-before:1em;-webkit-margin-after:1em;-webkit-margin-start:0;-webkit-margin-end:0;-webkit-padding-start:0}.form_default2 ul>li{float:left;width:100%;border-bottom:1px solid #efefef;padding-bottom:10px;margin-bottom:10px;line-height:15px;color:gray;isplay:list-item;list-style:none;text-align:-webkit-match-parent}.form_default2 ul>li>label{width:35%!important;float:left;cursor:pointer;font-size:12px;font-weight:700}.form_default2 label small{margin-left:0;margin-bottom:0;display:block;font-weight:400;font-style:italic;font-size:11px;color:#aaa}.form_default2 .input{float:left!important;padding-left:10px;width:59%}.form_default2 .input>input{min-width:210px!important;color:#666}.form_default2 fieldset>ul>div>li>label,.form_default2 fieldset>ul>li .label,.form_default2 fieldset>ul>li>label,.form_default2>ul>div>li>label,.form_default2>ul>li .label,.form_default2>ul>li>label{float:left;text-align:left;margin:0 3% 0 0;padding:8px}.form_default2 input[type=text],input[type=file],input[type=password],textarea{background:#f1f1f1;padding:8px;border:1px solid #d9d9d9;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px}.form_default2 button,input,select,textarea{font-size:100%;vertical-align:baseline;margin:5px 0;outline:0}.form_default2 input,button,isindex,keygen,meter,progress,select,textarea{-webkit-writing-mode:horizontal-tb}label.inline{font-weight:400!important;display:inline;width:auto!important;margin-right:8px}input[type=radio]{-webkit-appearance:radio;box-sizing:border-box}div.type-checkbox label{text-align:left;font-weight:400;width:auto!important;margin-right:8px!important}select{background-color:#fff;border-color:#333;border-radius:0;border-style:solid;border-width:1px;box-sizing:border-box;color:#333;cursor:default;display:none;font-family:Arial,Helvetica,sans-serif;font-size:13px;height:auto;letter-spacing:normal;line-height:normal;list-style:none;margin:5px 0;min-width:260px;outline:#333 0;text-align:start;text-indent:0;text-rendering:optimizelegibility;text-shadow:none;text-transform:none;vertical-align:baseline;visibility:hidden;white-space:pre;width:auto;word-spacing:0;writing-mode:lr-tb}.show_slug input[type=text]{background-color:#ffc;width:250px;padding:2px;border:1px solid #d9d9d9;border-radius:inherit!important;-moz-border-radius:5px;-webkit-border-radius:5px}
  
.portlet.light.bordered {
    margin-bottom: 110px;
}  
</style>

<!-- END PAGE HEAD-->
<!-- BEGIN PAGE BREADCRUMB -->
<div class="container">
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-10">
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="{{Route('dashboard')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Settings</span>
        <i class="fa fa-circle"></i>
    </li>
</ul>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-red-sunglo"></i>
            <span class="caption-subject font-red-sunglo bold uppercase">Settings</span>
            <!--<span class="caption-helper">form actions without bg color</span>-->
        </div>

    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->

        <div class="form-body">
            <div class="tabbable-custom ">
                <ul class="nav nav-tabs ">

                    <?php
                    $selected_tab = $tab;
                    foreach (array_keys($modules) as $index => $module_name) {
                        $class = ($selected_tab == $index) ? 'active' : '';
                        ?>
                        <li class="<?php echo $class; ?>">
                            <a href="#tab_s_<?php echo $index; ?>" data-toggle="tab"><?php echo $module_name ?></a>
                        </li>
                    <?php } ?>

                </ul>
                
                <div class="tab-content">
                    <?php
                    $count = 0;
                    foreach ($modules as $module_name => $module) {
                        $class = ($selected_tab == $count) ? 'active' : '';
                        ?>
                        <div class="tab-pane <?php echo $class; ?>" id="tab_s_<?php echo $count; ?>">
                            
                            <form method="post" action="{{ Route('admin-settings') }}" id="save_<?php echo $module_name ?>" >
                                @csrf
                                @method('PUT')
                                <div class="box-body">
                                    <?php
                                    $html = '';
                                    //'text','textarea','password','select','select-multiple','radio','checkbox'
                                    foreach ($module as $settings) {
                                        $html .= "<div class=\"form-group\" id=\"$settings->slug\">";
                                        $html .= '<label for="' . $settings->slug . '">' . $settings->title . '</label>';
                                        if (isset($_GET['debug'])) {
                                            $show_slug = '<br/><span class="show_slug"><input type="text" value="Settings::get(\'' . $settings->slug . '\')"/></span>&nbsp;&nbsp;&nbsp;<a href="' . base_url("settings/edit/$settings->slug") . '">Edit</a>';
                                        } else {
                                            $show_slug = '';
                                        }


                                        switch ($settings->type) {
                                            case 'text':
                                                $html .= "<div class=\"input type-{$settings->type}\">";
                                                $html .= "<input type=\"text\" class=\"form-control\" id=\"{$settings->slug}\" name=\"settings[{$settings->slug}]\" value=\"{$settings->value}\">";
                                                $html .= $show_slug;
                                                $html .= "</div>";
                                                break;
                                            case 'textarea':
                                                $html .= "<div class=\"input type-{$settings->type}\">";
                                                // $html .= "<div class = \"widgetbox inlineblock\">";
                                                // $html .= "<h3><span>Editor</span></h3>";
                                                //  $html .= "<div class = \"content nopadding\">";
                                                $html .= "<textarea rows = \"3\" class='form-control'  name = \"settings[{$settings->slug}]\" id = \"{$settings->slug}\">{$settings->value}</textarea>";
                                                $html .= $show_slug;
                                                $html .= "</div>";
                                                break;
                                            case 'password':
                                                $html .= "<div class=\"input type-{$settings->type}\">";
                                                $html .= "<input type=\"password\" class=\"form-control\" id=\"{$settings->slug}\" name=\"settings[{$settings->slug}]\" value=\"{$settings->value}\">";
                                                $html .= $show_slug;
                                                $html .= "</div>";
                                                break;
                                            case 'select':
                                                $html .= "<div class=\"input type-{$settings->type}\">";
                                                // $html .= form_dropdown($settings->slug, $settings->options, $settings->value, "id=\"{$settings->slug}\" class=\"sf chzn-select\"");
                                                $html .= $show_slug;
                                                $html .= "</div>";
                                                break;
                                            case 'select-multiple':
                                                $html .= "<div class=\"input type-{$settings->type}\">";
                                                // $html .= form_dropdown($settings->slug, $settings->options, $settings->value, "id=\"{$settings->slug}\" class=\"sf chzn-select\" multiple=\"multiple\"");
                                                $html .= $show_slug;
                                                $html .= "</div>";
                                                break;
                                            case 'radio':
                                                $options = explode('|', $settings->options);
                                                $html .= "<div class=\"input type-{$settings->type}\">";
                                                foreach ($options as $row) {
                                                    $row_data = explode('=', $row);
                                                    $k2 = $row_data[0];
                                                    $v2 = $row_data[1];
                                                    $checked = $k2 == $settings->value ? "checked=checked\"" : "";
                                                    $html .= "<label class=\"inline\">";
                                                    $html .= "<input type=\"radio\" name=\"settings[$settings->slug]\" value=\"{$k2}\" {$checked}>&nbsp;{$v2}";
                                                    $html .= "</label>";
                                                }
                                                $html .= $show_slug;
                                                $html .= "</div>";
                                                break;
                                            case 'checkbox':
                                                $html .= "<div class=\"input type-{$settings->type}\">";
                                                $data_arr = explode('|', $settings->options);
                                                foreach ($data_arr as $row) {
                                                    $option = explode('=', $row);
                                                    $k2 = $option[0];
                                                    $v2 = $option[1];
                                                    $n3 = $option[2];
                                                    $checked = ($v2 == $settings->value) ? "checked=\checked\"" : "";
                                                    $html .= "<label class=\"inline\">";
//                                                                $html .="<input style='display:none;' type=\"checkbox\" checked name=\"settings[$settings->slug][]\" value=\"0\">";
                                                    $html .= "<input type=\"checkbox\" name=\"settings[$settings->slug][]\" value=\"{$v2}\" {$checked}>&nbsp;{$n3}";
                                                    $html .= "</label>";
                                                }
                                                $html .= $show_slug;
                                                $html .= "</div>";
                                                break;
                                            default : $html .= "<div class=\"input type-{$settings->type}\">";
                                                $html .= "<label class=\"inline\">";
                                                $html .= "$settings->value";
                                                $html .= "</label>";
                                                $html .= $show_slug;
                                                $html .= "</div>";
                                        }
                                        $html .= '</div>';
                                    }
                                    echo $html;
                                    ?>
                                    <input type="hidden" value="<?php echo $module_name ?>" name="save_module_settings"/>
                                    <input type="hidden" value="<?php echo $count; ?>" name="tab"/>
                                    <?php
                                    if ($module_name !== 'System') {
                                        ?>

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    
                                                    <button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
                                                    <a href="{{Route('dashboard')}}" class="btn default">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </form>
                        </div>
                        <?php
                        $count++;
                    }
                    ?>                
                </div>
            </div>
        </div>

        </div>
        <!-- END FORM-->
    </div>
</div>
</div>
</div>


@endsection

@section('js')
<script>
    $(document).ready(function () {
        var current_tab = $('.nav-tabs').find('.active').find('a').text();

        if ($(".breadcrumb").find('li').length == 3) {
            $(".breadcrumb").find('li').last().html('&nbsp;'+current_tab);
        } else {
            $(".breadcrumb").append('<li>&nbsp;' + current_tab + '</li>');
        }



        $('[data-toggle="tab"]').click(function () {
            $('.tabbable-custom li').removeClass('active');
            $(this).parent('li').addClass('active');
            setTimeout(function () {

                var current_tab = $('.nav-tabs').find('.active').find('a').text();

                if ($(".breadcrumb").find('li').length == 3) {
                    $(".breadcrumb").find('li').last().html('&nbsp;'+current_tab);
                } else {
                    $(".breadcrumb").append('<li>&nbsp;' + current_tab + '</li>');
                }

            }, 500);


        });
    });

</script>

@endsection