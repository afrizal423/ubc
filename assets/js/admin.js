// Admin JS
$(document).ready(function() {
    // DataTables removed to match Stitch's custom Tailwind designs
    // If you need search/pagination, consider implementing Tailwind-specific solutions
    
    // Financial Chart
    if ($('#financialChart').length) {
        const ctx = document.getElementById('financialChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Income',
                    data: [1200000, 1900000, 3000000, 5000000, 2000000, 3000000],
                    borderColor: '#ec5b13',
                    backgroundColor: 'rgba(236, 91, 19, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Expense',
                    data: [1000000, 1200000, 1500000, 2000000, 1000000, 1500000],
                    borderColor: '#ef4444',
                    backgroundColor: 'rgba(239, 68, 68, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        labels: { color: '#94a3b8' }
                    }
                },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: 'rgba(255, 255, 255, 0.05)' },
                        ticks: { color: '#94a3b8' }
                    },
                    x: { 
                        grid: { display: false },
                        ticks: { color: '#94a3b8' }
                    }
                }
            }
        });
    }

    // Attendance Chart
    if ($('#attendanceChart').length) {
        const ctx = document.getElementById('attendanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Present', 'Absent', 'Late'],
                datasets: [{
                    data: [300, 50, 20],
                    backgroundColor: ['#22c55e', '#ef4444', '#f59e0b'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { 
                        position: 'bottom',
                        labels: { color: '#94a3b8' }
                    } 
                }
            }
        });
    }
});
