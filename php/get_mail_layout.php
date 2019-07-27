<?php
    function getMailLayout($msg)
    {
        $layout =  "        
        <table style='background-color: #3d85c6;padding: 8px 16px;width: 100%;color: #ffffff;'>
            <tr>
                <td><img src='http://www.wampinfotech.com/images/wamp-round-logo.png' height='50px' alt='WAMP InfoTech' />
                </td>
                <td style='line-height: 50px;vertical-align: top; margin:0px; font-size: 32px; font-weight: 500;'>LAWFIRM
                </td>
            </tr>
        </table>

        <table>
            <tbody>
                <tr>
                    <td style='padding: 20px;'>
                        <p>$msg</p>
                    </td>
                </tr>
            </tbody>
        </table>
        ";
        
        return $layout;
    }
