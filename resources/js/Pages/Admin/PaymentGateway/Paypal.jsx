import React, { useState } from 'react';
import Input from '@/Components/Input';
import { useForm } from '@inertiajs/react';
import Swal from 'sweetalert2';

const Paypal = ({ payment }) =>{

    const { data, setData, put, processing, errors, clearErrors, reset } = useForm({
        key:  payment.key,
        secret: payment.secret,
        status: payment.status,
    })

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }

    const handleSubmit = (e) =>{
        e.preventDefault();
        put(route('payment-gateway.update', payment.id),{
            onSuccess: () =>{
                reset();
                Swal.fire('Updated Successfully!','','success');
            },
            preserveState: (page) => Object.keys(page.props.errors).length,
        })
    }

    
    return (
        <div className="payment-cover p-4 mv-4">
            <form onSubmit={handleSubmit}>
                <div className="form-group  row">
                    <div className="col-sm-4">
                        <label htmlFor="">Client ID / KEY</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-sm-8 sticky">
                        <Input type="text" placeholder="Enter Client ID or App Key" handleChange={onHandleChange} value={data.key} className={errors.key && 'is-invalid'} name="key" />
                        {errors.key &&  <div className="invalid-feedback">{errors.key}</div> }
                    </div>
                </div>
                <div className="form-group  row">
                    <div className="col-sm-4">
                        <label htmlFor="">App Secret</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-sm-8 sticky">
                        <Input type="text" placeholder="Enter App Secret" handleChange={onHandleChange} value={data.secret} className={errors.secret && 'is-invalid'} name="secret" />
                        {errors.secret &&  <div className="invalid-feedback">{errors.secret}</div> }
                    </div>
                </div>
                <div className="form-group  row">
                    <div className="col-sm-4">
                        <label htmlFor="">Staatus</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-sm-8 sticky">
                        <select name="status" value={data.status} onChange={onHandleChange} className="form-control">
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>
                </div>
                <div className="form-group  row">
                    <div className="col-sm-4">
                        
                    </div>
                    <div className="col-sm-8 sticky">
                    <button className="btn px-4 btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    )
}
export default Paypal