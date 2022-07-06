import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  static values = {
    url: String
  }

  static targets = [
    'num1',
    'num2',
    'result'
  ];

  connect() {
    this.initData();
  }

  validate(event) {
    this.resetResult();

    if (event.keyCode == 45 && event.target.value.length >= 1) {
      if (event.target.value.indexOf('-') === -1) {
        event.target.value = '-' + event.target.value;
      }
      event.returnValue = false;
    }
    if (event.keyCode == 46 && event.target.value.length === 0) event.returnValue = false;
    if (event.keyCode == 46 && event.target.value.indexOf('.') > -1) event.returnValue = false;
    if (event.keyCode == 47 || event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
  }

  operation(event) {
    let num1 = this.num1Target.value;
    let num2 = this.num2Target.value;

    if (num1.length == 0 && num2.length == 0) {
        this.resultTarget.value = 'ERR. Requeridos numero 1 y numero 2';
        this.resultTarget.classList.add('text-danger');

        return false;
    }

    fetch(this.urlValue + event.currentTarget.dataset.operator + '/' + num1 + '/' + num2)
      .then(response => response.json())
      .then((data) => {
         this.resultTarget.value = data.result;
     })
     .catch(err => console.log(err));
  }

  reset() {
    this.initData();
  }

  initData() {
    this.num1Target.value = '';
    this.num2Target.value = '';
    this.resetResult();
  }

  resetResult() {
    this.resultTarget.value = 'Resultado';

    if (this.resultTarget.classList.contains('text-danger')) {
      this.resultTarget.classList.remove('text-danger');
    }
  }
}
