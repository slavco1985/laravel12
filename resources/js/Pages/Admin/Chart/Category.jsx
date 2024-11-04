import React, { useEffect, useState } from 'react';
import Chart from 'chart.js/auto';


const Category = ({category}) =>{
    useEffect(()=>{
        const ctx = document.getElementById('catchart');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: category.label,
                datasets: [{
                    label: 'Business Listings',
                    data: category.val,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                       
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                maintainAspectRatio: false,
                cutoutPercentage: 75,
                fill: true,
                legend: {
                    position: 'right',
                    display: false,
                    labels: {
                        boxWidth: 8
                    }
                },
                tooltips: {
                    displayColors: false,
                }
            }
        });
    },[])
    
    return (
        <canvas id="catchart"  height="350"></canvas>
    )
}
export default Category