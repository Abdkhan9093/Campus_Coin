import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();













/* =====================================================
   CAMPUS COIN JAVASCRIPT
===================================================== */


/* ================= STORAGE ================= */

const STORAGE_KEY = "campus_coin_data";


function getData() {

    return JSON.parse(

        localStorage.getItem(STORAGE_KEY)

        ||

        JSON.stringify({
            budget: 0,
            expenses: []
        })

    );

}


function saveData(data) {

    localStorage.setItem(
        STORAGE_KEY,
        JSON.stringify(data)
    );

}


/* ================= MONEY ================= */

function formatMoney(amount) {

    return "Rs. " +
        Number(amount || 0)
        .toLocaleString("en-PK");

}


/* ================= SET BUDGET ================= */

function setBudget() {

    const input =
        document.getElementById(
            "budgetInput"
        );


    if (!input) {

        return;

    }


    const amount =
        Number(input.value);


    if (
        input.value === "" ||
        amount <= 0
    ) {

        alert(
            "Please enter a valid budget amount."
        );

        return;

    }


    const data =
        getData();


    data.budget =
        amount;


    saveData(data);


    alert(
        "Your budget has been saved successfully!"
    );


    /*
        Budget save hone ke baad
        Expenses page par redirect.
    */

    window.location.href =
        "expenses.html";

}


/* ================= ADD EXPENSE ================= */

function addExpense() {

    const date =
        document.getElementById(
            "expenseDate"
        ).value;


    const category =
        document.getElementById(
            "category"
        ).value;


    const description =
        document.getElementById(
            "description"
        ).value.trim();


    const amount =
        Number(
            document.getElementById(
                "expenseAmount"
            ).value
        );


    if (!date) {

        alert(
            "Please select a date."
        );

        return;

    }


    if (!category) {

        alert(
            "Please select a category."
        );

        return;

    }


    if (!description) {

        alert(
            "Please enter an expense description."
        );

        return;

    }


    if (amount <= 0) {

        alert(
            "Please enter a valid amount."
        );

        return;

    }


    const data =
        getData();


    data.expenses.push({

        id:
            Date.now(),

        date:
            date,

        category:
            category,

        description:
            description,

        amount:
            amount

    });


    saveData(data);


    alert(
        "Expense saved successfully!"
    );


    /*
        Expense save hone ke baad
        History page par redirect.
    */

    window.location.href =
        "history.html";

}


/* ================= DELETE EXPENSE ================= */

function deleteExpense(id) {

    const confirmDelete =
        confirm(
            "Are you sure you want to delete this expense?"
        );


    if (!confirmDelete) {

        return;

    }


    const data =
        getData();


    data.expenses =
        data.expenses.filter(
            expense =>
                expense.id !== id
        );


    saveData(data);


    renderHistory();

    updateSummary();

}


/* ================= SUMMARY ================= */

function updateSummary() {

    const data =
        getData();


    const totalSpent =
        data.expenses.reduce(

            function(total, expense) {

                return total +
                    Number(expense.amount);

            },

            0

        );


    const remaining =
        data.budget -
        totalSpent;


    const budgetElement =
        document.getElementById(
            "totalBudget"
        );


    const spentElement =
        document.getElementById(
            "totalSpent"
        );


    const remainingElement =
        document.getElementById(
            "remaining"
        );


    if (budgetElement) {

        budgetElement.textContent =
            formatMoney(
                data.budget
            );

    }


    if (spentElement) {

        spentElement.textContent =
            formatMoney(
                totalSpent
            );

    }


    if (remainingElement) {

        remainingElement.textContent =
            formatMoney(
                Math.max(
                    0,
                    remaining
                )
            );

    }

}


/* ================= HISTORY ================= */

function renderHistory() {

    const table =
        document.getElementById(
            "expenseTable"
        );


    if (!table) {

        return;

    }


    const data =
        getData();


    table.innerHTML = "";


    if (
        data.expenses.length === 0
    ) {

        table.innerHTML = `

            <tr>

                <td
                    colspan="5"
                    class="empty">

                    <i class="fa-solid fa-receipt"></i>

                    <br>

                    No expenses added yet.

                    <br><br>

                    <a href="expenses.html">

                        Add Your First Expense

                    </a>

                </td>

            </tr>

        `;

        return;

    }


    const expenses =
        [...data.expenses]
        .reverse();


    expenses.forEach(
        function(expense) {

            const row =
                document.createElement(
                    "tr"
                );


            row.innerHTML = `

                <td>
                    ${expense.date}
                </td>

                <td>
                    ${expense.category}
                </td>

                <td>
                    ${expense.description}
                </td>

                <td>
                    <strong>
                        ${formatMoney(
                            expense.amount
                        )}
                    </strong>
                </td>

                <td>

                    <button
                        class="delete-btn"
                        onclick="deleteExpense(
                            ${expense.id}
                        )">

                        <i class="fa-solid fa-trash"></i>

                        Delete

                    </button>

                </td>

            `;


            table.appendChild(row);

        }
    );

}


/* ================= CONTACT ================= */

function sendMessage(event) {

    event.preventDefault();


    alert(
        "Thank you! Your message has been sent successfully."
    );


    event.target.reset();

}


/* ================= PAGE LOAD ================= */

document.addEventListener(
    "DOMContentLoaded",

    function() {

        updateSummary();

        renderHistory();


        /*
            Expense page par
            today's date automatically.
        */

        const dateInput =
            document.getElementById(
                "expenseDate"
            );


        if (
            dateInput &&
            !dateInput.value
        ) {

            const today =
                new Date()
                .toISOString()
                .split("T")[0];


            dateInput.value =
                today;

        }

    }

);
