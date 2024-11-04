import React, { useEffect, useState, useCallback } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import BlogMenu from './Share/BlogMenu';
import Cropper from 'react-easy-crop';
import { router } from '@inertiajs/react';

const Image = (props) =>{

    
    const [image, setImage] = useState(props.image);
    const [cropearea, setcropeArea] = useState([]);
    const saveImage = () =>{
        let arr = {'crop' : cropearea,'bid':props.bid}
        router.post(route('crope-blog-image', arr))
    }

    const [crop, setCrop] = useState({ x: 0, y: 0 })
    const [zoom, setZoom] = useState(1)
    const onCropComplete = useCallback((croppedArea, croppedAreaPixels) => {
        setcropeArea(croppedAreaPixels);
    }, [])


    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Blog Image" path="Blog" pathurl="" />
            <Panel title="Crop Blog Image" md="10">
                    <div className="card-header p-0">
                           <BlogMenu active="image" bid={props.bid} />
                    </div>
                    <div className="card-body tab-content p-4">
                        <div className="form-container ">
                            <div className="row form-row">
                                <div className="col-md-8 mx-auto">
                                    {
                                        (image != '/storage/blog/default.png') && 
                                        <div className=" row">
                                            <div className="com-md-12 crope-cover">
                                                <div className="crop-container">
                                                        <Cropper image={image}  crop={crop} zoom={zoom}
                                                            onCropChange={setCrop} cropSize={{width:420, height: 280 }}
                                                        onCropComplete={onCropComplete}
                                                        onZoomChange={setZoom}
                                                        />
                                                </div>
                                            </div>
                                        
                                            <div className="col-md-8 mt-3 ">
                                                <div className="controls">
                                                    <input  type="range"  value={zoom}
                                                    min={1}  max={3} step={0.1}  aria-labelledby="Zoom"
                                                    onChange={(e) => {
                                                        setZoom(e.target.value)
                                                    }}
                                                    className="zoom-range"
                                                    />
                                                    </div>
                                            </div>
                                            <div className="col-md-4 mt-3 ">
                                                    <button onClick={saveImage} className="btn w-100 btn-primary">Save and Continue</button>
                                            </div>
                                        </div>
                                    }
                                </div>
                            </div>
                        </div>
                    </div>
            </Panel>
        </Authenticated>
    )
}
export default Image