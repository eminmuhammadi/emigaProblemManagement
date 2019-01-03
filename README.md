# Emiga Problem Management

## Installing
```
git clone https://github.com/eminmuhammadi/emigaproblemmanagement
```

## Requiretments
```
* PHP (Tested on 7.2.11)
* Apache/2.4.35 (AllowOverride All - Enable .htaccess )

<Directory /var/www/html/example.com/public_html>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>

* MySQL (10.1.36-MariaDB)
```


## Configuration (Step by Step)
### 1) Install Database at *install/emigaproject.sql*
### 2) Configure Database connection at *config/emigaDB.php*

```
2 |
3 |	$connect = mysqli_connect("/*Server*/"  , "/*Login*/"  , "/*Password*/"  , "/*Database*/");  
4 |
```

You can change also port and socket

```
2 |
3 |	$connect = mysqli_connect("/*Server*/"  , "/*Login*/"  , "/*Password*/"  , "/*Database*/" , "/*Port*/ , "/*Socket*/");  
4 |
```

### 3) Configure core process at *template/process.php*
```
18|
19| /*Enable Debug*/ 	ini_set('display_errors', '1');

	/*
	*   1 - Display Errors
	*	2 - Disable Display Errors
	*/	
20|
```

### Cache Controlling using function at *functions/emigaCache.php*
```
26|
27|			emigaCacheStart('1','1');
			/*
			*	emigaCacheStart("/*Comment*/","/*WhiteSpace*/");
			*   1 - Enable 
			*   0 - Disable	
			*/
28|
```

### Configuration title
```
32|
33| $powered= "/* Main Title */" 
34|
35| 

		***  Title Configuration ***

94|
```
### 4) Run using http://localhost:{port} or http://localhost and test

## File Directories

### BACKEND
```
|+| app (CS)
|+| config
|+| functions
|+| install
|+| lib
|+| template
|-| .htaccess (Must important)
|-| ***
   		***
   			***
```
### FRONTEND
```
|+| app
	
	|+| fonts
	|+| static
		|-| css.php (For Minify -> version-app.css)
		|-| js.php  (For Minify beta -> version-app.js)
	|-| .htaccess (Must Important)
	|-| 404.php
	|-| dashboard.php	
	|-| index.php
	|-| login.php
	|-| logout.php
	|-| register.php
	|-| system.php
	|-| verify.php							
```
## How it works ?

### Functions *functions*
```
|+| functions
	|-| emigaCache.php	
			-- Removing whitespaces and comments from html		
	|-| emigaDateFormatter.php
			-- Custom Date Formattig
	|-| emigaIpDetector.php
			-- Detect Ip address of Client
	|-| emigaLoginVerify.php
			-- Authentication session
	|-| emigaServerUsage.php			
			-- Works only Linux (Calculates RAM and CPU loading)
```
### Library *lib*
```
|+| lib
	|-| emigaLib.php	
			-- Connecting all functions to library			
```
### Template *template*
```
|+| template
	|+| dashboard	
			|+| permission
				  * * *
		 * * *
 * * * 		 		  

```


### Permission

* BASIC USER

user_permission|token
------------|-------------
U|xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

- [x] Statics for User
- [x] Create Problem
- [x] My Problems
- [ ] My Tasks
- [ ] All Problems
- [x] Edit Problems {Only Yours}
- [ ] Send Problem Notifications to User
- [ ] Deleted Problems
- [ ] Users
- [ ] Edit Users
- [ ] Send Notifications
- [ ] Create Department
- [ ] Edit Department
- [x] User Settings {all information | email | password | mobile}
- [ ] Support {RAM | CPU}
- [x] Support GA Members

* ADMINISTRATOR

user_permission|token
------------|-------------
A|xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

- [x] Statics for Department
- [ ] Create Problem
- [ ] My Problems
- [x] My Tasks
- [ ] All Problems
- [x] Edit Problems {Show | Editing disabled}
- [ ] Send Problem Notifications to User
- [ ] Deleted Problems
- [ ] Users
- [ ] Edit Users
- [ ] Send Notifications
- [ ] Create Department
- [ ] Edit Department
- [x] User Settings {all information | email | password | mobile}
- [ ] Support {RAM | CPU}
- [x] Support GA Members


* GRAND ADMINISTRATOR

user_permission|token
------------|-------------
GA|xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx


- [x] Statics for All
- [x] Create Problem
- [x] My Problems
- [x] My Tasks
- [x] All Problems
- [x] Edit Problems 
- [x] Send Problem Notifications to User
- [x] Deleted Problems
- [x] Users
- [x] Edit Users
- [x] Send Notifications
- [x] Create Department
- [x] Edit Department
- [x] User Settings {all information | email | password | mobile}
- [x] Support {RAM | CPU}
- [x] Support GA Members

## Authors

* **Emin Muhammadi** - *Initial work* - [EminMuhammadi](https://github.com/eminmuhammadi)

See also the list of [contributors](https://github.com/eminmuhammadi/emigaproblemmanagement/contributors) who participated in this project.

## Update

See Update Changes [UPDATE.txt](UPDATE.txt) file for details

## Supported Languages

* Azerbaijani

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
