<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody><tr>
            <td valign="top" style="background:#ffffff;border-collapse:collapse" bgcolor="#FFFFFF">
                <table border="0" cellpadding="23" cellspacing="0" width="100%">
                    <tbody><tr>
                            <td valign="top" style="border-collapse:collapse">
                                <div style="color:#808080;font-family:Arial;font-size:14px;line-height:150%;text-align:left" align="left">
                                    <div style="color:#808080;font-family:Arial;font-size:14px;line-height:150%;margin:5px 2px;text-align:left" align="left">
                                    </div>
                                    <div style="color:#808080;font-family:Arial;font-size:14px;line-height:150%;margin:5px 2px;text-align:left" align="left">
                                       
                                    </div>
                                    <div style="color:#808080;font-family:Arial;font-size:14px;line-height:150%;margin:5px 2px;text-align:left" align="left">
                                    </div>
                                    <div style="color:#808080;font-family:Arial;font-size:14px;line-height:150%;margin:5px 2px;text-align:left" align="left">
                                        <div style="color:#808080;font-family:Arial;font-size:14px;line-height:150%;text-align:left" align="left">
                                           @php
    use App\Cms;
    $favicon=Cms::where('slug','=','favicon')->first();
    $title=Cms::where('slug','=','title')->first();
    
    @endphp
                                            <font><font>
                                            Thank you for your attention and trust with <a href="{{ URL('/') }}" style="color:#a30046;font-weight:normal;text-decoration:none" target="_blank"><strong><font>{!!isset($title->content_body) && $title->content_body!=''?$title->content_body:'Fast Card'!!}</font></strong></a>
                                            </font></font><br>
                                            <br>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>