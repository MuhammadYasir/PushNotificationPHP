"use strict";

function e(id) {
  return document.getElementById(id);
}

var sendMessageCalled = false;
var tokensList = [];

function addTokenToList() {
  sendMessageCalled = false;
  e('errorMsgList').innerHTML = '';
  var sToken = e('token').value;
  if (sToken) {
    tokensList.push(sToken);
    e('token').value = '';
    updateFrontend();
  }
  else {
    e('errorMsgList').innerHTML = 'Please enter token first.';
  }
}

function removeTokenFromList() {
  sendMessageCalled = false;
  e('errorMsgList').innerHTML = '';
  if(tokensList.length > 1){
    tokensList.pop();
    updateFrontend();
  }
  else {
    e('errorMsgList').innerHTML = 'There is no item in the list.';
  }
}

function updateFrontend() {
  e('sendPN').style.display = tokensList.length == 0 ? "none" : "inline";

  var lis = '', hfs ='';
  tokensList.forEach(token => {
    lis += '<li class="li-token">' + token + '</li>';
    hfs += '<input type="hidden" name="tokens[]" value="' + token + '" />'
  });
  e('lstTokens').innerHTML = lis;
  e('divTokens').innerHTML = hfs;
}

function sendMessage() {
  sendMessageCalled = true;
}

function validateForm() {
  if (sendMessageCalled == false) {
    return false;
  }

  var vTitle = e('title').value;
  if (!vTitle || vTitle == '') {
    e('errorMsgSend').innerHTML = 'Please enter Title.';
    return false;
  }

  var vMessage = e('message').value;
  if (!vMessage || vMessage == '') {
    e('errorMsgSend').innerHTML = 'Please enter Message.';
    return false;
  }

  return true;
}