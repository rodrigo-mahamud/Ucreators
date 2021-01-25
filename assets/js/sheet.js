function doPost(e) {
	Logger.log(JSON.stringify(e));

	var destination_id = "1GhY2bthuMmQ6f4CGMn2oeTuQyIy40VfC"; // ID OF GOOGLE DRIVE DIRECTORY;
	var destination = DriveApp.getFolderById(destination_id);

	var data = Utilities.base64Decode(e.parameter.fileData);
	var blob = Utilities.newBlob(data, e.parameter.mimeType, e.parameter.fileName);
	destination.createFile(blob);

	listRecord(e.parameter.namec, e.parameter.linkc, e.parameter.linkrs, e.parameter.tag, e.parameter.price, e.parameter.amount, e.parameter.namer, e.parameter.surnamer, e.parameter.email, e.parameter.fphone, e.parameter.content, e.parameter.fileName, e.parameter.publicidad, e.parameter.terminos);

	var htmlOutput = HtmlService.createTemplateFromFile("UploadFile");
	htmlOutput.message = "File Uploaded";
	return htmlOutput.evaluate();
}

function listRecord(namec, linkc, linkrs, tag, price, amount, namer, surnamer, email, fphone, content, filename, publicidad, terminos) {
	var url = "https://docs.google.com/spreadsheets/d/12a72P88XatBYx775Wl0IpxAv_RWYzI7uyqDM1GvzyBE/edit#gid=0"; //URL OF GOOGLE SHEET;
	var ss = SpreadsheetApp.openByUrl(url);
	var recordsSheet = ss.getSheetByName("Records");
	recordsSheet.appendRow([namec, linkc, linkrs, tag, price, amount, namer, surnamer, email, fphone, content, filename, publicidad, terminos, new Date()]);
}

function getUrl() {
	var url = ScriptApp.getService().getUrl();
	return url;
}
