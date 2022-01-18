# Hôtes virtuels

### httpd-vhost.conf

Ajouter ce texte:

```apacheconf
<VirtualHost rg.local:80>
    DocumentRoot "C:\chemin\vers\dossier\public\du\projet"
    ServerName rg.local
    ServerAlias www.rg.local
</VirtualHost>
```

___
### hosts
Dans windows, aller dans le fichier **hosts** (`C:\Windows\System32\drivers\etc`) et ajouter :
````
127.0.0.1 rg.local
````
Si tout est bien enregistré, http://rg.local/, devrait afficher le projet