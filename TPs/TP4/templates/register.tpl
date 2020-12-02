<form action="register" method="POST">
    <p>
        <label for="">Nom</label>
        <input type="text" name="nom" value={$nom|escape|default:''}>
        {$error.nom|default:''}
    </p>
    <p>
        <label for="">Email</label>
        <input type="email" name="email" value={$email|escape|default:''}>
        {$error.email|default:''}
    </p>
    <p>
        <label for="">Mot de passe</label>
        <input type="password" name="mdp">
        {$error.mdp|default:''}
    </p>
    <p><input type="submit" name=""></p>
</form>

