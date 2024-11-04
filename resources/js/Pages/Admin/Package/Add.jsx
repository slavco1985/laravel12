import React from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { usePage, useForm } from '@inertiajs/react';
import Input from '@/Components/Input';
import TextArea from '@/Components/TextArea';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';

const Add = (props) =>{
    const packages = props.packages; 
    const { url } = usePage()
    const { data, setData, post, put, processing, errors, clearErrors, reset } = useForm({
        name: packages.name,
        desic: packages.desic,
        price: packages.price,
        listing:packages.listing,
        verification:packages.verification,
        message:packages.message,
        review:packages.review,
        services:packages.services,
        products:packages.products,
        images:packages.images,
        validity:packages.validity,
    })

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }
    
    const savePackage = (e) =>{
        e.preventDefault();
        if(url == '/admin/package/create'){
            post(route('package.store'),{
                onSuccess: () => {
                    reset();
                },
            });
            
        }else{
            put(route('package.update', packages.id));
           // reset();
        }
       
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Add Package" path="Package" pathurl="" />
            <Panel title="Add New Package" md="6">

                <form onSubmit={savePackage} className="p-4" id="catform" >
                    <div className="form-group  row">
                        <div className="col-sm-4">
                            <label htmlFor="">Package Name</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-8 sticky">
                            <Input type="text"  className={errors.name && 'inerror'} name="name" value={data.name}
                                placeholder="Enter Package Name" handleChange={onHandleChange}/>
                            {errors.name &&  <div className="smart-valid">{errors.name}</div> }
                        </div>
                    </div>
                    
                    <div className="form-group  row">
                        <div className="col-sm-4">
                            <label htmlFor=""> Description</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-8 sticky">
                            <TextArea type="text" className={errors.desic && 'inerror'}  name="desic" value={data.desic}
                                placeholder="Enter Description"  handleChange={onHandleChange}/>
                            {errors.desic &&  <div className="smart-valid">{errors.desic}</div> }
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-4">
                            <label htmlFor="">Package Cost</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-8 sticky">
                            <Input type="text" className={errors.price && 'inerror'}   name="price" value={data.price} 
                                placeholder="Enter Package Cost" isFocused={true} handleChange={onHandleChange}/>
                            {errors.price &&  <div className="smart-valid" id="desic-err">{errors.price}</div> }
                        </div>
                        
                    </div>

                    <h4 className='pactattribut'>Package Attributes</h4>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor=""> Total No of Listings</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5 sticky">
                            <select name="listing" value={data.listing} onChange={(e)=>onHandleChange(e)} id="" className="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor=""> Verified Badge</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5 sticky">
                            <select name="verification" value={data.verification} id=""  onChange={(e)=>onHandleChange(e)} className="form-control">
                                <option value="Yes" >Yes</option>
                                <option value="No" >No</option>
                            </select>
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">Messages from Visitors</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5 sticky">
                            <select name="message" id="" value={data.message} onChange={(e)=>onHandleChange(e)} className="form-control">
                                <option value="Allowed">Allowed</option>
                                <option value="Not Allowed">Not Allowed</option>
                            </select>
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">Accept Reviews</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5 sticky">
                            <select name="review" id="" value={data.review}  onChange={(e)=>onHandleChange(e)} className="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>

                    

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">No of Services Allowed / Listing</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5 sticky">
                            <select name="services" value={data.services} id="" onChange={(e)=>onHandleChange(e)} className="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                            </select>
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">No of Products Allowed / Listing </label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5 sticky">
                            <select name="products" value={data.products} id="" onChange={(e)=>onHandleChange(e)} className="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                            </select>
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">No of Images Allowed / Listing </label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5 sticky">
                            <select name="images" id=""  value={data.images} onChange={(e)=>onHandleChange(e)} className="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                            </select>
                            
                        </div>
                    </div>

                    <div className="form-group  row">
                        <div className="col-sm-7">
                            <label htmlFor="">Package Validity</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-5 sticky">
                            <select name="validity" id="" value={data.validity} onChange={(e)=>onHandleChange(e)} className="form-control">
                                <option value="1">1 Month</option>
                                <option value="3">3 Months</option>
                                <option value="6">6 Months</option>
                                <option value="12">1 Years</option>
                                <option value="36">3 Years</option>
                                <option value="60">5 Years</option>
                                <option value="0">Lifetime</option>
                            </select> 
                        </div>
                    </div>

                    <div className="form-group  no-margin-bottom row">
                        <div className="col-sm-6">

                        </div>
                        
                        <div className="col-sm-6 text-end">
                            {
                                url == '/admin/package/create' 
                                ? <button disabled={processing}  className="btn w-100 btn-primary">Add Package</button>
                                : <button disabled={processing}  className="btn w-100 btn-primary">Update Package</button>
                            }
                            
                        </div>
                    </div>
                </form>

            </Panel>
        </Authenticated>
    )
}
export default Add;
