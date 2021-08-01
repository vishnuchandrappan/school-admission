import React, { useContext, useState } from "react";
import {
    Form,
    Input,
    Button,
    DatePicker,
    Radio,
    Checkbox,
    Divider,
    Card,
} from "antd";
import { FormHeader } from "../FormHeader";
import { Plus, X } from "react-feather";
import { useDynamicObject } from "../hooks/useDynamicObject";
import { useBoolean } from "../hooks/useBoolean";
import { Declaration } from "../Declaration";
import { DeclarationContext } from "../services/DeclarationService";
import { useDate } from "../hooks/useDate";
import { SchoolName } from "../form-elements/SchoolName";
import { Name } from "../form-elements/Name";
import { Gender } from "../form-elements/Gender";
import { DOB } from "../form-elements/DOB";
import { Location } from "../form-elements/Location";
import { Guardian } from "../form-elements/Guardian";
import { Address } from "../form-elements/Address";
import { Preferences } from "../form-elements/Preferences";
import { PhoneEmail } from "../form-elements/PhoneEmail";
import { PreviousAttempts } from "../form-elements/PreviousAttempts";
import { Marks } from "../form-elements/Marks";

const { Item } = Form;

const plainOptions = [
    "Orthopaedical",
    "Blind",
    "Deaf",
    "Mental/Brain Distress",
    "Handicapped",
    "Not Applicable",
];

export const ManagementForm = () => {
    const { accepted, place } = useContext(DeclarationContext);

    const [passing, setPassing] = useDate();

    const onFinish = (values) => {
        console.log("values => ", values);
        // const data = {
        //     ...values,
        //     passing,
        //     dob,
        //     grades,
        //     otherGrades,
        //     preferences,
        //     place,
        // };

        // if (isAddressSame) {
        //     data["current_address"] = data["permanent_address"];
        //     data["current_pin"] = data["permanent_pin"];
        // } else if (
        //     ["current_address"].length === 0 ||
        //     data["current_pin"].length === 0
        // ) {
        //     alert("Current address or pin cannot be blank");
        //     return;
        // }

        // if (havePreviousAttempts) {
        //     data["previousAttempts"] = previousAttempts;
        // }

        // console.log("Received values of form: ", data);
    };

    return (
        <>
            <FormHeader />
            <h2 className="form--heading">Management Quota</h2>
            <Divider />
            <Form
                name="management_form"
                className="login-form"
                initialValues={{
                    remember: true,
                }}
                onFinish={onFinish}
                labelCol={{ span: 24 }}
                wrapperCol={{ span: 24 }}
            >
                <Item
                    name="qualifying_examination"
                    label="Name of Qualifying Examination"
                    rules={[
                        {
                            required: true,
                        },
                    ]}
                >
                    <Input placeholder="Eg: SSLC" />
                </Item>
                <Item
                    name="register_number"
                    label="Register Number"
                    rules={[
                        {
                            required: true,
                        },
                    ]}
                >
                    <Input type="number" placeholder="Register Number" />
                </Item>

                <SchoolName />

                <Item
                    name="passing"
                    label="Month & Year of passing"
                    rules={[
                        {
                            required: true,
                        },
                    ]}
                >
                    <DatePicker
                        onChange={setPassing}
                        picker="month"
                        placeholder="Month and year"
                    />
                </Item>

                <Name />
                <Gender />
                <DOB />
                <Guardian />

                <Item
                    name="community"
                    label="Community Name"
                    rules={[
                        {
                            required: true,
                        },
                    ]}
                >
                    <Input type="text" placeholder="Community" />
                </Item>

                <Item
                    name="is_latin_catholic"
                    label="Whether applicant belongs to Latin Catholic (if yes, attach the copy of catechism certificate)"
                    rules={[
                        {
                            required: true,
                        },
                    ]}
                >
                    <Radio.Group>
                        <Radio value={false}>No</Radio>
                        <Radio value={true}>Yes</Radio>
                    </Radio.Group>
                </Item>

                <Item
                    name="differently_abled"
                    label="Whether applicant is differently abled (Choose relevant)"
                    rules={[
                        {
                            required: true,
                        },
                    ]}
                >
                    <Checkbox.Group options={plainOptions} />
                </Item>

                <Location />
                <Address />
                <PhoneEmail />
                <PreviousAttempts />
                <Divider />
                <Marks />
                <Divider />
                <Preferences />
                <Divider />
                <Declaration />

                <Item>
                    <Button
                        type="primary"
                        htmlType="submit"
                        className="login-form-button"
                        disabled={!accepted}
                    >
                        Submit Form
                    </Button>
                </Item>
            </Form>
        </>
    );
};
