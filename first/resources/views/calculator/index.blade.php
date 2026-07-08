<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .container {
            width: 100%;
            max-width: 380px;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .calculator-wrapper {
            background: linear-gradient(135deg, #1f1f2e 0%, #2d2d44 100%);
            border-radius: 35px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.1);
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .display-screen {
            background: linear-gradient(135deg, #0f0f1e 0%, #1a1a2e 100%);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: inset 0 5px 15px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.05);
            min-height: 100px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .previous-operand {
            color: #888;
            font-size: 18px;
            font-weight: 500;
            min-height: 24px;
            letter-spacing: 1px;
        }

        .current-operand {
            color: #00d4ff;
            font-size: 48px;
            font-weight: 600;
            word-wrap: break-word;
            word-break: break-all;
            min-height: 60px;
            text-align: right;
            text-shadow: 0 0 20px rgba(0, 212, 255, 0.3);
            letter-spacing: 2px;
        }

        .buttons-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        button {
            padding: 18px;
            border: none;
            border-radius: 16px;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            font-family: 'Segoe UI', sans-serif;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s;
        }

        button:hover::before {
            left: 100%;
        }

        button:active {
            transform: scale(0.95);
        }

        .btn-number {
            background: linear-gradient(135deg, #3a3a4a 0%, #2a2a3a 100%);
            color: #00d4ff;
            border: 1px solid rgba(0, 212, 255, 0.2);
        }

        .btn-number:hover {
            background: linear-gradient(135deg, #4a4a5a 0%, #3a3a4a 100%);
            box-shadow: 0 8px 20px rgba(0, 212, 255, 0.2);
            transform: translateY(-2px);
        }

        .btn-operator {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
            color: white;
            border: 1px solid rgba(255, 107, 107, 0.2);
        }

        .btn-operator:hover {
            background: linear-gradient(135deg, #ff7c7c 0%, #ff5a7e 100%);
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
            transform: translateY(-2px);
        }

        .btn-equals {
            background: linear-gradient(135deg, #00d4ff 0%, #0099cc 100%);
            color: #1f1f2e;
            font-weight: 700;
            grid-column: span 2;
            border: 1px solid rgba(0, 212, 255, 0.2);
        }

        .btn-equals:hover {
            background: linear-gradient(135deg, #00e4ff 0%, #00aadd 100%);
            box-shadow: 0 8px 30px rgba(0, 212, 255, 0.4);
            transform: translateY(-2px);
        }

        .btn-clear {
            background: linear-gradient(135deg, #ff9800 0%, #f57c00 100%);
            color: white;
            grid-column: span 2;
            border: 1px solid rgba(255, 152, 0, 0.2);
        }

        .btn-clear:hover {
            background: linear-gradient(135deg, #ffaa22 0%, #ff8800 100%);
            box-shadow: 0 8px 25px rgba(255, 152, 0, 0.3);
            transform: translateY(-2px);
        }

        .btn-delete {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            border: 1px solid rgba(231, 76, 60, 0.2);
        }

        .btn-delete:hover {
            background: linear-gradient(135deg, #ec7063 0%, #e74c3c 100%);
            box-shadow: 0 8px 25px rgba(231, 76, 60, 0.3);
            transform: translateY(-2px);
        }

        .error-message {
            color: #ff6b6b;
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
            animation: shake 0.5s;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
            color: #00d4ff;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 0 10px rgba(0, 212, 255, 0.2);
        }

        @media (max-width: 480px) {
            .container {
                max-width: 100%;
            }

            .current-operand {
                font-size: 36px;
            }

            button {
                padding: 16px;
                font-size: 18px;
            }
        }

        .result-box.error .result-value {
            color: #dc3545;
        }

        .result-label {
            color: #666;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .result-value {
            color: #333;
            font-size: 32px;
            font-weight: 600;
        }

        .reset-btn {
            width: 100%;
            padding: 10px;
            background: #e0e0e0;
            color: #333;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .reset-btn:hover {
            background: #d0d0d0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">🧮 CALCULATOR</div>

        <div class="calculator-wrapper">
            <div class="display-screen">
                <div class="previous-operand" id="previousOperand"></div>
                <div class="current-operand" id="currentOperand">0</div>
            </div>

            <div class="buttons-grid">
                <!-- Row 1: AC, DEL, /, * -->
                <button class="btn-clear" onclick="clearDisplay()">AC</button>
                <button class="btn-delete" onclick="deleteLast()">DEL</button>
                <button class="btn-operator" onclick="appendOperator('/')">÷</button>
                <button class="btn-operator" onclick="appendOperator('*')">×</button>

                <!-- Row 2: 7, 8, 9, - -->
                <button class="btn-number" onclick="appendNumber('7')">7</button>
                <button class="btn-number" onclick="appendNumber('8')">8</button>
                <button class="btn-number" onclick="appendNumber('9')">9</button>
                <button class="btn-operator" onclick="appendOperator('-')">−</button>

                <!-- Row 3: 4, 5, 6, + -->
                <button class="btn-number" onclick="appendNumber('4')">4</button>
                <button class="btn-number" onclick="appendNumber('5')">5</button>
                <button class="btn-number" onclick="appendNumber('6')">6</button>
                <button class="btn-operator" onclick="appendOperator('+')">+</button>

                <!-- Row 4: 1, 2, 3, = -->
                <button class="btn-number" onclick="appendNumber('1')">1</button>
                <button class="btn-number" onclick="appendNumber('2')">2</button>
                <button class="btn-number" onclick="appendNumber('3')">3</button>
                <button class="btn-equals" onclick="calculate()">=</button>

                <!-- Row 5: 0, . -->
                <button class="btn-number" style="grid-column: span 2;" onclick="appendNumber('0')">0</button>
                <button class="btn-number" onclick="appendNumber('.')">.</button>
            </div>

            <div id="errorMessage" class="error-message"></div>
        </div>
    </div>

    <script>
        const csrfToken = '{{ csrf_token() }}';
        let currentOperand = '0';
        let previousOperand = '';
        let operation = null;
        let shouldResetDisplay = false;

        function updateDisplay() {
            document.getElementById('currentOperand').textContent = currentOperand;
            if (operation) {
                document.getElementById('previousOperand').textContent = `${previousOperand} ${operation}`;
            } else {
                document.getElementById('previousOperand').textContent = '';
            }
        }

        function appendNumber(number) {
            clearError();

            if (shouldResetDisplay) {
                currentOperand = number;
                shouldResetDisplay = false;
            } else {
                if (number === '.' && currentOperand.includes('.')) return;
                if (number === '.' && currentOperand === '0') {
                    currentOperand = '0.';
                } else if (currentOperand === '0' && number !== '.') {
                    currentOperand = number;
                } else {
                    currentOperand += number;
                }
            }

            updateDisplay();
        }

        function appendOperator(nextOperation) {
            clearError();

            if (currentOperand === '') return;

            if (previousOperand !== '' && operation) {
                computeResult();
                previousOperand = currentOperand;
            } else {
                previousOperand = currentOperand;
            }

            operation = nextOperation;
            shouldResetDisplay = true;
            updateDisplay();
        }

        function clearDisplay() {
            clearError();
            currentOperand = '0';
            previousOperand = '';
            operation = null;
            shouldResetDisplay = false;
            updateDisplay();
        }

        function deleteLast() {
            clearError();
            if (currentOperand === '0') return;
            currentOperand = currentOperand.slice(0, -1);
            if (currentOperand === '') currentOperand = '0';
            updateDisplay();
        }

        function computeResult() {
            let result;
            const prev = parseFloat(previousOperand);
            const current = parseFloat(currentOperand);

            if (isNaN(prev) || isNaN(current)) return;

            switch (operation) {
                case '+':
                    result = prev + current;
                    break;
                case '-':
                    result = prev - current;
                    break;
                case '*':
                    result = prev * current;
                    break;
                case '/':
                    if (current === 0) {
                        showError('Zero se divide nahi ho sakta!');
                        return;
                    }
                    result = prev / current;
                    break;
                default:
                    return;
            }

            currentOperand = result.toString();
            operation = null;
            previousOperand = '';
            shouldResetDisplay = true;
            updateDisplay();
        }

        async function calculate() {
            clearError();

            if (!operation || previousOperand === '' || currentOperand === '') {
                showError('Pehle calculation setup karo!');
                return;
            }

            const num1 = parseFloat(previousOperand);
            const num2 = parseFloat(currentOperand);

            try {
                const response = await fetch('/calculate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        num1: num1,
                        num2: num2,
                        operation: operation
                    })
                });

                const data = await response.json();

                if (data.error) {
                    showError(data.error);
                } else {
                    currentOperand = data.result.toString();
                    operation = null;
                    previousOperand = '';
                    shouldResetDisplay = true;
                    updateDisplay();
                }
            } catch (error) {
                showError('Calculation mein error hua!');
            }
        }

        function showError(message) {
            const errorEl = document.getElementById('errorMessage');
            errorEl.textContent = message;
            errorEl.style.display = 'block';
        }

        function clearError() {
            const errorEl = document.getElementById('errorMessage');
            errorEl.textContent = '';
            errorEl.style.display = 'none';
        }

        // Initial display
        updateDisplay();
