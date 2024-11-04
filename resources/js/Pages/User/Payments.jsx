import React, { useEffect, useState } from 'react';
import User from '@/Layouts/User';
import UserMenu from '@/Layouts/UserMenu';
import Path from './Shared/Path';
import { usePage } from '@inertiajs/react';

const Payments = (props) =>{

    const [purchase, setPurchase] = useState(props.purchase);
    const { currency } = usePage().props

    return (
        <User>
           <Path title="Payment History" />
                <div className="container-fluid user-container">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-3">
                                    <UserMenu user={props.auth.user} />
                                </div>
                                
                                <div className="col-md-9">
                                    <div className="row">
                                        <div className="col-md-10 bg-white shadow p-3 mx-auto">
                                        <table className='table mb-0'>
                                            <tbody>
                                                <tr>
                                                    <th className='slno fs-6 text-center'>#</th>
                                                    <th className='fs-6'>Package Name</th>
                                                    <th className='fs-6 center'>Amount</th>
                                                    <th className='text-center fs-6'>Transaction ID</th>
                                                    <th className='center fs-6'>Purchase Date</th>
                                                </tr>
                                                {
                                                    purchase && purchase.map((p, i)=>{
                                                        return <tr key={i}>
                                                            <td className='text-center'>{i + 1}</td>
                                                            <td>{p.pack}</td>
                                                            <td className='center'>{currency}{p.amount}</td>
                                                            <td className='text-center'>{p.transaction_id}</td>
                                                            <td className='text-center'>{p.dat}</td>
                                                        </tr>
                                                    })
                                                }
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                </div>
        </User>
        
    )
}
export default Payments