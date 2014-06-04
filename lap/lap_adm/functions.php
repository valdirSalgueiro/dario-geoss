<?
include('style.php');

function printError($error, $width = 100, $url = '')
{
    

    echo '<TABLE class=border cellSpacing=0 cellPadding=0 width=' . $width . '%" align=center border=0>
															<TR>
															<TD>
															<TABLE cellSpacing=1 cellPadding=5 width="100%" border=0>
																<TR>
																<TD class=info align=center><B>Erro</B></TD>
																</TR>

					<tr><td class=error><br><b><font color=red>';
    if ($url == '') {
        echo $error . "</font></b><br><br>";
    } else {
        echo $error . "<br><br><a href=$url>$lang_click_here</a></font></b><br><br>";
    }
    echo '</td></tr>
															</table>
															</td>
															</tr>
															</table>';
}

/**
 * function printSuccess():
 * 		Takes a string as input.  Outputs the message in a nice table format.
 */

function printSuccess($msg, $width = 100, $url = '')
{
    
    echo '<TABLE class=border cellSpacing=0 cellPadding=0 width=' . $width . '%" align=center border=0>
															<TR>
															<TD>
															<TABLE cellSpacing=1 cellPadding=5 width="100%" border=0>
																<TR>
																<TD class=info align=center><B>A&ccedil;&atilde;o completada com Sucesso</B></TD>
																</TR>

																<tr><td class=error align=center><br><b><font color=green>';
    if ($url == '') {
        echo $msg . "</font></b><br><br>";
    } else {
        echo $msg . "<br><br><a href=$url>$lang_click_here</a></font></b><br><br>";
    }
    echo '</td></tr>
															</table>
															</td>
															</tr>
															</table>';
}
?>