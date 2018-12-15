# Emiga Problem Management

## Configuring Project

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

### Template *template*
```
|+| template
	|+| dashboard	
			|+| permission
				  * * *
		 * * *
 * * * 		 		  

```