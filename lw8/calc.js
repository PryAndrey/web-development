function calc(calcStr) {
    calcStr = calcStr.replace(/[()]/g, ' ');
    calcStr = calcStr.replace(/\s+/g, ' ').trim();
    let tokens = calcStr.split(' ');
    
    let i = 0;
    let computeFail = false;
    let invalState = false;
    let invalFormat = true;

    for (let k = 0; k < tokens.length; k++) {
        if (!((isFinite(tokens[k])) ||
             ['*', '/', '+', '-'].includes(tokens[i]))) {
            invalFormat = false;
        } 
    }

    while (tokens.length > 1) {
        if (!invalFormat) {
            break;
        }

        if (tokens.length < 3)  {
            invalState = true;
            break;
        }

        if (['*', '/', '+', '-'].includes(tokens[i]) &&
             isFinite(tokens[i + 1]) && 
             isFinite(tokens[i + 2]) ) {
            tokens[i] = compute(tokens[i], tokens[i + 1], tokens[i + 2]);
            
            if (tokens[i] == 'Infinity') {
                computeFail = true;
                break;
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

    if (invalState) {
        console.log('Ошибка: недостающие данные');
    } else if (!invalFormat) {
        console.log('Ошибка: некорректно введенные данные');
    }  else if (computeFail) {
        console.log('Ошибка: попытка деления на ноль');
    } else {
        tokens = parseFloat(tokens);
        console.log(tokens);
    }        
    
}

function compute(operator, firstOperand, secondOperand) {
    switch(operator) {
        case '/' : {
            firstOperand = parseFloat(firstOperand) / parseFloat(secondOperand);
            break
        }
        case '*' : {
            firstOperand = parseFloat(firstOperand) * parseFloat(secondOperand);
            break
        }
        case '+' : {
            firstOperand = parseFloat(firstOperand) + parseFloat(secondOperand);
            break
        }
        case '-' : {
            firstOperand = parseFloat(firstOperand) - parseFloat(secondOperand);
            break
        }
    }
    firstOperand = firstOperand.toString();
    return firstOperand;
} 