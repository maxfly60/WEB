{extends file="base.tpl"}
{block name="title"}Connexion{/block}
{block name="body"}
    <form class="pure-form pure-form-aligned" method="post" action="{$BASE_PATH}/login">
        <fieldset>
            <div class="pure-control-group">
                <label for="aligned-email">Adresse e-mail : </label>
                <input name="email" type="email" id="aligned-email" placeholder="exemple@iut.lomis.fr" required {if (isset($post['email']))}value="{$post['email']}"{/if} />
                {if (isset($error['email']))}<span class="pure-form-message">{$error['email']}</span>{/if}
            </div>
            <div class="pure-control-group">
                <label for="aligned-password">Mot de passe : </label>
                <input name="mdp" type="password" id="aligned-password" placeholder="Password" required />
                {if (isset($error['mdp']))}<span class="pure-form-message">{$error['mdp']}</span>{/if}
            </div>
            {if (isset($error['error']))}<p class="pure-form-message">{$error['error']}</p>{/if}
            <div class="pure-controls">
                <button type="submit" class="pure-button pure-button-primary">Se connecter</button>
            </div>
        </fieldset>
    </form>
{/block}

