<!DOCTYPE html>
<html lang="en" manifest="resources.appcache">
<head>
	<title>jsSHA - SHA Hashes in JavaScript</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="keywords" content="SHA, SHA-1, SHA-2, SHA-224, SHA-256, SHA-384, SHA-512, HMAC, javascript, JS, Secure Hash Standard, hash, security, cryptography, FIPS 180-2" />
	<link rel="shortcut icon" href="favicon.ico" />
	<style><?php echo file_get_contents('style.css') ?></style>
	<script type="text/javascript"><?php echo file_get_contents('sha.js') ?></script>
	<script type="text/javascript">
		function calcHash() {
			try {
				var hashInput = document.getElementById("hashInputText");
				var hashInputType = document.getElementById("hashInputType");
				var hashVariant = document.getElementById("hashVariant");
				var hashOutputType = document.getElementById("hashOutputType");
				var hashOutput = document.getElementById("hashOutputText");
				var hashObj = new jsSHA(hashInput.value, hashInputType.options[hashInputType.selectedIndex].value);
				hashOutput.value = hashObj.getHash(
					hashVariant.options[hashVariant.selectedIndex].value,
					hashOutputType.options[hashOutputType.selectedIndex].value
				);
			} catch(e) {
				hashOutput.value = e
			}
		}

		function calcHMAC() {
			try {
				var hmacText = document.getElementById("hmacInputText");
				var hmacTextType = document.getElementById("hmacTextType");
				var hmacKeyInput = document.getElementById("hmacInputKey");
				var hmacKeyInputType = document.getElementById("hmacKeyType");
				var hmacVariant = document.getElementById("hmacVariant");
				var hmacOutputType = document.getElementById("hmacOutputType");
				var hmacOutput = document.getElementById("hmacOutputText");
				var hmacObj = new jsSHA(hmacText.value, hmacTextType.options[hmacTextType.selectedIndex].value);

				hmacOutput.value = hmacObj.getHMAC(
					hmacKeyInput.value,
					hmacKeyInputType.options[hmacKeyInputType.selectedIndex].value,
					hmacVariant.options[hmacVariant.selectedIndex].value,
					hmacOutputType.options[hmacOutputType.selectedIndex].value
				);
			} catch(e) {
				hmacOutput.value = e
			}
		}
	</script>
</head>
<body onload="calcHash();calcHMAC()">
	<div id="container">
		<div>
			<img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('logo.png')) ?>" alt="jsSHA" style="margin: 0px auto" />
			<h1>About</h1>
			<p>
				jsSHA is a JavaScript implementation of the entire family of SHA hashes as defined in FIPS 180-2 (SHA-1, SHA-224, SHA-256,
				SHA-384, and SHA-512) as well as HMAC.  Despite JavaScript not natively supporting 64-bit operations, SHA-384 and SHA-512 are even implemented!
				jsSHA is also 100% cross-browser compatible.
			</p>
		</div>
		<div>
			<h1>Newest Release / Download</h1>
			<p>
				As of 28 December 2012, the newest release is v1.42 and can be found at <a href="https://github.com/Caligatio/jsSHA/tree/release-1.42">GitHub</a>.
			</p>
		</div>
		<div>
			<h1>Demo</h1>
			<p>
				Be aware that if JavaScript is disabled in your browser there is the possibility that information entered into the below fields may be transmitted to the GitHub web servers.  Ensure that JavaScript is enabled to prevent this possibility.
			</p>
			<form action="#" method="get">
				<fieldset>
					<legend>Hashing Demo</legend>
					<p>
						Simply insert your text to be hashed, input type, the SHA variant you wish to use, and the output format.<br />
						<span style="font-size: 12px">Note: You may have to scroll the output text for longer length hashes</span>
					</p>
					<div>
						<label for="hashInputText">Input Text:</label><input type="password" size="75" name="hashInputText" id="hashInputText" onkeyup="calcHash()" autocomplete="off"/>
					</div>
					<div>
						<label for="hashInputType">Input Type:</label>
						<select name="hashInputType" id="hashInputType" onchange="calcHash()">
							<option value="B64">Base-64</option>
							<option selected="selected">TEXT</option>
							<option>HEX</option>
						</select>
					</div>
					<div>
						<label for="hashVariant">SHA Variant:</label>
						<select name="hashVariant" id="hashVariant" onchange="calcHash()">
							<option>SHA-1</option>
							<option>SHA-224</option>
							<option>SHA-256</option>
							<option>SHA-384</option>
							<option>SHA-512</option>
						</select>
					</div>
					<div>
						<label for="hashOutputType">Output Type:</label>
						<select name="hashOutputType" id="hashOutputType" onchange="calcHash()">
							<option value="B64">Base-64</option>
							<option selected="selected">HEX</option>
						</select>
					</div>
					<div>
						<label for="hashOutputText">Output Hash:</label>
						<input type="text" size="75" name="hashOutputText" id="hashOutputText" style="background-color: #b1ceed" />
					</div>
				</fieldset>
				<fieldset>
					<legend>HMAC Demo</legend>
					<p>
						Simply insert your text to be hashed, text type, key, key type, the SHA variant you wish to use, and the output format.<br />
						<span style="font-size: 12px">Note: You may have to scroll the output text for longer length hashes</span>
					</p>
					<div>
						<label for="hmacInputText">Input Text:</label><input type="password" size="75" name="hmacInputText" id="hmacInputText" onkeyup="calcHMAC()" autocomplete="off"/>
					</div>
					<div>
						<label for="hmacTextType">Input Type:</label>
						<select name="hmacTextType" id="hmacTextType" onchange="calcHMAC()">
							<option value="B64">Base-64</option>
							<option selected="selected">TEXT</option>
							<option>HEX</option>
						</select>
					</div>
					<div>
						<label for="hmacInputKey">Key:</label><input type="password" size="75" name="hmacInputKey" id="hmacInputKey" onkeyup="calcHMAC()" autocomplete="off"/>
					</div>
					<div>
						<label for="hmacKeyType">Key Type:</label>
						<select name="hmacKeyType" id="hmacKeyType" onchange="calcHMAC()">
							<option value="B64">Base-64</option>
							<option selected="selected">TEXT</option>
							<option>HEX</option>
						</select>
					</div>
					<div>
						<label for="hmacVariant">SHA Variant:</label>
						<select name="hmacVariant" id="hmacVariant" onchange="calcHMAC()">
							<option>SHA-1</option>
							<option>SHA-224</option>
							<option>SHA-256</option>
							<option>SHA-384</option>
							<option>SHA-512</option>
						</select>
					</div>
					<div>
						<label for="hmacOutputType">Output Type:</label>
						<select name="hmacOutputType" id="hmacOutputType" onchange="calcHMAC()">
							<option value="B64">Base-64</option>
							<option selected="selected">HEX</option>
						</select>
					</div>
					<div>
						<label for="hmacOutputText">Output Hash:</label>
						<input type="text" size="75" name="hmacOutputText" id="hmacOutputText" style="background-color: #b1ceed" />
					</div>
				</fieldset>
			</form>
		</div>
				<div id="copyright">
			Copyright &copy; 2008-2012 <a href="https://github.com/Caligatio/">Brian Turek</a>
		</div>
	</div>
</body>
</html>
