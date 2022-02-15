# Hôtes virtuels

### httpd-vhost.conf

Ajouter ce texte:

```apacheconf
<VirtualHost *:80>
    DocumentRoot "C:\chemin\vers\dossier\public\du\projet"
    ServerName rg.dev
    ServerAlias *.rg.dev
</VirtualHost>
```

___
### hosts
Dans windows, aller dans le fichier **hosts** (`C:\Windows\System32\drivers\etc`) et ajouter :
````
127.0.0.1 rg.dev
````
Si tout est bien enregistré, http://rg.dev/, devrait afficher le projet