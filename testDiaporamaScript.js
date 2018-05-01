function recuperationString() {
	stringChiffreJavascript = document.getElementById("php").innerHTML;
}

function affectationString() {
	javascript.innerHTML = stringChiffreJavascript;
}

function nombreOccurence() {
	stringMatches = stringChiffreJavascript.match(/i:[0-9]*;i:[0-9]*;/g);
	compteur = stringMatches.length;
	occurence.innerHTML = compteur;
}

function patternOccurence() {
	stringMatches = stringChiffreJavascript.match(/i:[0-9]*;i:[0-9]*;/g);
	patternA = stringMatches[0].match(/;i:[0-9]*/g) + "";
	patternAA = patternA.substring(3);
	patternB = stringMatches[1].match(/;i:[0-9]*/g) + "";
	patternBB = patternB.substring(3);
	patternC = stringMatches[2].match(/;i:[0-9]*/g) + "";
	patternCC = patternC.substring(3);
	patternD = stringMatches[3].match(/;i:[0-9]*/g) + "";
	patternDD = patternD.substring(3);
	patternE = stringMatches[4].match(/;i:[0-9]*/g) + "";
	patternEE = patternE.substring(3);
	patternF = stringMatches[5].match(/;i:[0-9]*/g) + "";
	patternFF = patternF.substring(3);
	patternG = stringMatches[6].match(/;i:[0-9]*/g) + "";
	patternGG = patternG.substring(3);
	patternH = stringMatches[7].match(/;i:[0-9]*/g) + "";
	patternHH = patternH.substring(3);
	patternI = stringMatches[8].match(/;i:[0-9]*/g) + "";
	patternII = patternI.substring(3);
	patternJ = stringMatches[9].match(/;i:[0-9]*/g) + "";
	patternJJ = patternJ.substring(3);
	patternK = stringMatches[10].match(/;i:[0-9]*/g) + "";
	patternKK = patternK.substring(3);
	patternL = stringMatches[11].match(/;i:[0-9]*/g) + "";
	patternLL = patternL.substring(3);
	patternM = stringMatches[12].match(/;i:[0-9]*/g) + "";
	patternMM = patternM.substring(3);
	patternN = stringMatches[13].match(/;i:[0-9]*/g) + "";
	patternNN = patternN.substring(3);
	patternO = stringMatches[14].match(/;i:[0-9]*/g) + "";
	patternOO = patternO.substring(3);
	patternP = stringMatches[15].match(/;i:[0-9]*/g) + "";
	patternPP = patternP.substring(3);
	patternQ = stringMatches[16].match(/;i:[0-9]*/g) + "";
	patternQQ = patternQ.substring(3);
	patternR = stringMatches[17].match(/;i:[0-9]*/g) + "";
	patternRR = patternR.substring(3);
	patternS = stringMatches[18].match(/;i:[0-9]*/g) + "";
	patternSS = patternS.substring(3);
	patternT = stringMatches[19].match(/;i:[0-9]*/g) + "";
	patternTT = patternT.substring(3);
	patternU = stringMatches[20].match(/;i:[0-9]*/g) + "";
	patternUU = patternU.substring(3);
	patternV = stringMatches[21].match(/;i:[0-9]*/g) + "";
	patternVV = patternV.substring(3);
	patternW = stringMatches[22].match(/;i:[0-9]*/g) + "";
	patternWW = patternW.substring(3);
	patternX = stringMatches[23].match(/;i:[0-9]*/g) + "";
	patternXX = patternX.substring(3);
	patternY = stringMatches[24].match(/;i:[0-9]*/g) + "";
	patternYY = patternY.substring(3);
	occurenceA.innerHTML = patternAA;
	occurenceB.innerHTML = patternBB;
	occurenceC.innerHTML = patternCC;
	occurenceD.innerHTML = patternDD;
	occurenceE.innerHTML = patternEE;
	occurenceF.innerHTML = patternFF;
	occurenceG.innerHTML = patternGG;
	occurenceH.innerHTML = patternHH;
	occurenceI.innerHTML = patternII;
	occurenceJ.innerHTML = patternJJ;
	occurenceK.innerHTML = patternKK;
	occurenceL.innerHTML = patternLL;
	occurenceM.innerHTML = patternMM;
	occurenceN.innerHTML = patternNN;
	occurenceO.innerHTML = patternOO;
	occurenceP.innerHTML = patternPP;
	occurenceQ.innerHTML = patternQQ;
	occurenceR.innerHTML = patternRR;
	occurenceS.innerHTML = patternSS;
	occurenceT.innerHTML = patternTT;
	occurenceU.innerHTML = patternUU;
	occurenceV.innerHTML = patternVV;
	occurenceW.innerHTML = patternWW;
	occurenceX.innerHTML = patternXX;
	occurenceY.innerHTML = patternYY;
}

function cheminFichier() {
	cheminA = patternUU;
	cheminAA = "diapo/"+cheminA+".png";
	chemin.innerHTML = cheminAA;
}

function ajoutPhoto() {
	document.getElementById("photo").src=cheminAA;
}