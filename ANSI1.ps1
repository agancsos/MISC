###############################################################################
# Name        : ANSI1.ps1                                                     #
# Author      : Abel Gancsos                                                  #
# Version     : v. 1.0.0.0                                                    #
# Description : Fun with ANSI colors.  Doesn't actually do anything.          #
###############################################################################
param
(
    $PATH = $env:USERPROFILE    
)
if ($PATH -eq "" -or $PATH -eq $null)
{
    $PATH = $env:HOME;
}
$e = [char]0x1b;
Write-Host("$($e)[33mSetting up$($e)[m");
Write-Host("$($e)[31mAttack$($e)[m");
Write-Host("$($e)[36mDeleting: $($PATH)$($e)[m");
Write-Host("$($e)[33mJK$($e)[m");
Write-Host("$($e)[33mDone$($e)[m");
