// 問1
let numbers = [2, 5, 12, 13, 15, 18, 22];

function isEven(array) {
  for (let i = 0; i < array.length; i++) {
    if (array[i] % 2 === 0) {
      console.log(array[i] + 'は偶数です');
    }
  }
}

isEven(numbers);


// 問2
class Car {
  constructor(gas, number) {
    this.gas = gas;
    this.number = number;
  }

  getNumGas() {
    console.log(`ガソリンは${this.gas}です。ナンバーは${this.number}です`);
  }
}

let car_A = new Car(20, 1234);
car_A.getNumGas(); 