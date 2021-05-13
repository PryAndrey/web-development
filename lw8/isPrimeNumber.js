let numbers;
let x = [5, 11, 2, 7, 9];

function isPrimeNumbers(numbers) {
    let isPrime = true;
	
    if (typeof numbers == "number") {
		numbers = [numbers];
	};
	
    for (var i = 0; i < numbers.length; i++) {
        if (typeof numbers[i] === 'number' ) {
            for (let j = 2; j < numbers[i]; j++) {
                if ( numbers[i] % j == 0 ) {
                    isPrime = false;
                    break;
                }
            }
            if (isPrime) {
                console.log(numbers[i], 'is prime numbers');
            } else {
                console.log(numbers[i], 'is not prime numbers');
            }
        } else {
		    console.log(numbers[i], 'error');
		}
    }
}

isPrimeNumbers(4);
isPrimeNumbers(7);
isPrimeNumbers(x);
isPrimeNumbers('c');