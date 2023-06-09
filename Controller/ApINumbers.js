// I am creating a function to obtain an access token from Universial Tutorial API
//this makes authorized access
function getAccessToken(getAuthorizedRequest){
  const httpRequest = new XMLHttpRequest();

  httpRequest.onreadystatechange = function(){
    if(this.status === 200 && this.readyState === 3){
      const response = JSON.parse(this.response);
      console.log(response, typeof response);
      if(typeof getAuthorizedRequest === 'function'){
        getAuthorizedRequest(response.auth_token);
      }
    }
  }

  httpRequest.open('GET','https://www.universal-tutorial.com/api/getaccesstoken');
  httpRequest.setRequestHeader('accept','application/json');
  httpRequest.setRequestHeader('api-token','JKq-lQZjNRm6Qq2IQ2RDyGjNXfatvmfuGq93sZsYKxQD40tA38-cqDjz4tdCIPqNaNw');
  httpRequest.setRequestHeader('user-email','amjeshtri21@epoka.edu.al');
  
  httpRequest.send();
}
getAccessToken(getCountriesCode);
function getCountriesCode(authToken){
  //making an http request
  const httpRequest = new XMLHttpRequest();

  httpRequest.onreadystatechange = function(){
    if(this.readyState === 4 && this.status === 200){
      const countries = JSON.parse(this.response);
      console.log(countries);
      const selectCountry = document.getElementById('country');

      countries.forEach((country)=>{
        const option = document.createElement('option');
        option.text = country.country_name + ' (+' + country.country_phone_code + ')';
        option.value = country.country_phone_code;

        selectCountry.appendChild(option);
      });
    }
  }
  httpRequest.open('GET','https://www.universal-tutorial.com/api/countries');
  httpRequest.setRequestHeader('accept', 'application/json');
  httpRequest.setRequestHeader('authorization',`Bearer ${authToken}`);

  httpRequest.send();
}

const form = document.querySelector('form');
form.addEventListener('change',(event)=>{
  if(event.target.id === 'country' && event.target.value){
    getAccessToken(
      (token)=> getCountriesCode(token, event.target.value)
    );
  }
});

const countryInput = document.getElementById('country');
const phoneInput = document.getElementById('phone');

countryInput.addEventListener('change',()=>{
  const countryCode = countryInput.value;

  phoneInput.placeholder = `+(${countryCode})`;
});

let signup = document.getElementById['submit'];
document.addEventListener('submit',()=>{
    window.location = "../Views/login.php";
});
