function calc(calcStr) {
    calcStr = calcStr.replace(/[()]/g, ' ');
    calcStr = calcStr.replace(/\s+/g, ' ').trim();
    var tokens = calcStr.split(' ');

    var error = checkValidity(tokens);
	if(error == 0)
		error = process(tokens);

    if (error == 1) {
        console.log('Ошибка: недостающие данные');
    } else if (error == 2) {
        console.log('Ошибка: некорректно введенные данные');
    }  else if (error == 3) {
        console.log('Ошибка: попытка деления на ноль');
    } else {
        tokens = parseFloat(tokens);
        console.log(tokens);
    }        
    
}

function checkValidity(tokens)
{
	if(tokens.length < 3) return false;
	for (let k = 0; k < tokens.length; k++) {
        if ((!isNaN(tokens[k])) && (!(["*", "/", "+", "-"].includes(tokens[k])))) {
            return false;
        } 
    }
	return true;
}

function process(tokens)
{
	var i = 0;
	while (tokens.length > 1) {
        if (tokens.length < 3)  {
            return 1;
        }

        if (i > tokens.length - 2)  {
			return 2;
        }

        if (["*", "/", "+", "-"].includes(tokens[i]) && isNaN(tokens[i + 1]) && isNaN(tokens[i + 2]) ) {
            tokens[i] = compute(tokens[i], tokens[i + 1], tokens[i + 2]);
            
				console.log(tokens[i]);
            if (tokens[i] == 'Infinity') {
                return 3;
            }
            
            delete tokens[i + 1];
            delete tokens[i + 2];
            for (let j = i + 1; j < tokens.length - 2; j++) {
                tokens[j] = tokens[j + 2];
            }
            tokens.pop();
            tokens.pop();

            i = 0; 
        } else {
            i++;
        }
    }
}

function compute(operator, firstOperand, secondOperand) {
    switch(operator) {
        case "/" : 
			if(secondOperand == 0) return 'Infinity';
            firstOperand = parseFloat(firstOperand) / parseFloat(secondOperand);
            break;
        
        case "*" : 
            firstOperand = parseFloat(firstOperand) * parseFloat(secondOperand);
            break;
        
        case "+" : 
            firstOperand = parseFloat(firstOperand) + parseFloat(secondOperand);
            break;
        
        case "-" : 
            firstOperand = parseFloat(firstOperand) - parseFloat(secondOperand);
            break;
        
    }
    firstOperand = firstOperand.toString();
    return firstOperand;
} 


