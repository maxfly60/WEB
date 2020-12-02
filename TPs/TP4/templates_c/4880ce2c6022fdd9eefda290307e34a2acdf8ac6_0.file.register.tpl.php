<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-02 13:11:21
  from 'C:\Users\Aurel509\Documents\IUT\WEB\TPs\TP4\templates\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fc792799bf100_62099157',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4880ce2c6022fdd9eefda290307e34a2acdf8ac6' => 
    array (
      0 => 'C:\\Users\\Aurel509\\Documents\\IUT\\WEB\\TPs\\TP4\\templates\\register.tpl',
      1 => 1606914528,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc792799bf100_62099157 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="register" method="POST">
    <p>
        <label for="">Nom</label>
        <input type="text" name="nom" value=<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['nom']->value, ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['error']->value['nom'])===null||$tmp==='' ? '' : $tmp);?>

    </p>
    <p>
        <label for="">Email</label>
        <input type="email" name="email" value=<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '' : $tmp);?>
>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['error']->value['email'])===null||$tmp==='' ? '' : $tmp);?>

    </p>
    <p>
        <label for="">Mot de passe</label>
        <input type="password" name="mdp">
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['error']->value['mdp'])===null||$tmp==='' ? '' : $tmp);?>

    </p>
    <p><input type="submit" name=""></p>
</form>

<?php }
}
