# MC_Static_Website2

----------------------------------------------------------------------
Les pages :

Index.html-->Page Accueil

events.html-->Page Evènements

about.html-->Page Présentation

contact.html-->Page Contact

insert.php et form.php ( vous les trouvez dans le dossier project !)-->Page Inscription

-------------------------------------------------------------------------------------------------

in order for the registration button to work you have to follow those steps:

//Pour le button d'inscrire ( au niveau de la page inscription) je vous mentionner la configuration suivante :

1/put the folder named project that contains the php files(form.php and insert.php) in the following path 'C:\wamp64\www' (where you installed wampserver ) 

//Mettez le dossier (project) ou contient les fichiers(form.php et insert.php) dans le path suivant 'C:\wamp64\www' (ou vous avez instale wampserver ) 

2/ download and add the sendmail unziped file and put it in the wamp server file as well ---> here is the link : https://www.glob.com.au/sendmail/ 

// telecharger et ajouter le dossier sendmail et metter le dans le dossier wamp64 'C:\wamp64\www' ---> Lien https://www.glob.com.au/sendmail/ 


3/ go to sendmail.ini and paste this code 

//modifier le fichier sendmail.ini ( se trouve dans le dossier sendmail) et modifier le avec se code suivant :

--------------------------------------------------------------------------------------------------------------------------------------------------------------
[sendmail]

; you must change mail.mydomain.com to your smtp server,
; or to IIS's "pickup" directory.  (generally C:\Inetpub\mailroot\Pickup)
; emails delivered via IIS's pickup directory cause sendmail to
; run quicker, but you won't get error messages back to the calling
; application.

smtp_server=smtp.gmail.com

; smtp port (normally 25)

smtp_port=465

; SMTPS (SSL) support
;   auto = use SSL for port 465, otherwise try to use TLS
;   ssl  = alway use SSL
;   tls  = always use TLS
;   none = never try to use SSL

smtp_ssl=ssl

; the default domain for this server will be read from the registry
; this will be appended to email addresses when one isn't provided
; if you want to override the value in the registry, uncomment and modify

default_domain=localhost

; log smtp errors to error.log (defaults to same directory as sendmail.exe)
; uncomment to enable logging

error_logfile=error.log

; create debug log as debug.log (defaults to same directory as sendmail.exe)
; uncomment to enable debugging

debug_logfile=debug.log

; if your smtp server requires authentication, modify the following two lines

auth_username=projet.pweb20@gmail.com
auth_password=projectpweb20

; if your smtp server uses pop3 before smtp authentication, modify the 
; following three lines.  do not enable unless it is required.

pop3_server=
pop3_username=
pop3_password=

; force the sender to always be the following email address
; this will only affect the "MAIL FROM" command, it won't modify 
; the "From: " header of the message content

force_sender=

; force the sender to always be the following email address
; this will only affect the "RCTP TO" command, it won't modify 
; the "To: " header of the message content

force_recipient=

; sendmail will use your hostname and your default_domain in the ehlo/helo
; smtp greeting.  you can manually set the ehlo/helo name if required

hostname=localhost

-----------------------------------------------------------------------------------------------------------------------------------------------------------

4/ update your php.ini( you will find it in the task bar , then by left click on wampserver's icon , go to php-->php-->php.ini) ( from wampserver by adding this code instead) .then, search [mail function] in your php.ini (press Ctrl F to search ) and add the path to the sendmail file.executable it should look like this --> sendmail_path = "C:\wamp64\sendmail\sendmail.exe -t -i" 
//modifier le fichier php.ini (se trouve par click gauche sur l'icon de wampserver se trouve sur la barre de tache ->php->php.ini)(apres clicker Ctrl+F et  rechercher
 [mail function] et copier le code suivant)
 
 
5/ put in comments all the code from the mail function until the sendmail_path :
//metter des ( ; ) au debut de chaque ligne apres  [mail function] jusqu'a sendmail_path , en copiant le code suivant  :

[mail function]

; For Win32 only.

; http://php.net/smtp

;SMTP = localhost

; http://php.net/smtp-port

;smtp_port = 25

; For Win32 only.

; http://php.net/sendmail-from

;sendmail_from ="admin@wampserver.invalid"

; For Unix only.  You may supply arguments as well (default: "sendmail -t -i").

; http://php.net/sendmail-path

sendmail_path = "C:\wamp64\sendmail\sendmail.exe -t -i"

[PS : ALL THE FILES AND CODE MENTIONNED HERE WILL BE AT NECESSARY FILES TO DOWNLOAD ]

