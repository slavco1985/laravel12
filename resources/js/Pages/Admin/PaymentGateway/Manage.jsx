import React, { useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import Paypal from './Paypal';

const Manage = (props) =>{
    const [payments, setPayments] = useState(props.payments);

   

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Payment Gateway" path="Settings" pathurl="" />
            <div className="row">
                {
                    payments && payments.map((p, i)=>{
                        return <div key={i} className="col-md-6 mb-4">
                            <Panel title={` ${p.name} Payment Gateway`}  md="12">
                                <Paypal payment={p} />
                            </Panel>
                        </div>
                    })
                }
            </div>
        </Authenticated>
    )
}
export default Manage;